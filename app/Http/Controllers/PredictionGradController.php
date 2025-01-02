<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Study;
use DivisionByZeroError;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PredictionGradController extends Controller
{
    public function index()
    {
        $studies = Study::orderBy('id', 'asc')->get();
        return view('prediksi-kelulusan.index', compact('studies'));
    }
    protected function categorical($dataTraining, $studies)
    {
        $result = collect([]);
        foreach ($dataTraining as $value) {
            $studyCategories = [];

            foreach ($studies as $study) {
                $studyId = $study['id'];
                $studyKey = 'mapel-' . $studyId;
                $studyValue = $value[$studyKey];
                // 1 : Tinggi, 0 : Rendah
                $studyCategories[$studyKey] = $studyValue >= $study['min'] ? 1 : 0;
            }

            $result->push([
                'name' => $value['name'],
                'status' => $value['status'] ?? 0,
                ...$studyCategories
            ]);
        }

        return $result;
    }

    public function naiveBayes(Request $request)
    {
        $studies = Study::orderBy('id', 'asc')->get();
        $rules = [
            'dataSiswa' => 'required|array',
            'dataSiswa.*' => 'required|string',
            'nilaiSiswa' => 'required|array',
        ];
        $messages = [
            'dataSiswa.*.required' => 'Data siswa wajib diisi',
            'dataSiswa.*.string' => 'Data siswa harus berupa string',
        ];

        $dataNilaiSiswaBaru = collect([]);
        foreach ($studies as $study) {
            $nilai = $request->nilaiSiswa['mapel-' . $study->id];
            $kategori = ($nilai >= $study->min) ? "Tinggi" : "Rendah";
            $dataNilaiSiswaBaru->push([
                'id' => $study->id,
                'mapel' => $study->name,
                'nilai' => $nilai,
                'kategori' => $kategori,
                'color' => ($kategori == "Tinggi") ? "success" : "danger"
            ]);
        }

        foreach ($studies as $study) {
            $rules['nilaiSiswa.mapel-' . $study->id] = "required|numeric|min:0|max:{$study->max}";
            $messages['nilaiSiswa.mapel-' . $study->id . '.required'] = "Nilai {$study->name} wajib diisi";
            $messages['nilaiSiswa.mapel-' . $study->id . '.numeric'] = "Nilai {$study->name} harus berupa angka";
            $messages['nilaiSiswa.mapel-' . $study->id . '.min'] = "Nilai {$study->name} minimal 0";
            $messages['nilaiSiswa.mapel-' . $study->id . '.max'] = "Nilai {$study->name} maksimal {$study->max}";
        }

        $validates = Validator::make($request->all(), $rules, $messages);
        if ($validates->fails()) {
            return response()->json([
                'success' => 400,
                'errors' => $validates->errors(),
            ]);
        }

        $dataSiswaBaru = $request->dataSiswa;
        $nilaiSiswaBaru = $request->nilaiSiswa;

        // peng-kategorian-an nilai siswa baru
        foreach ($studies as $study) {
            $studyId = $study->id;
            $studyKey = "mapel-$studyId";
            $nilai = floatval($nilaiSiswaBaru[$studyKey]);
            $nilaiSiswaBaru[$studyKey] = $nilai > $study->min ? 1 : 0;
        }

        // $mapels = collect([
        //     [
        //         'id' => 1,
        //         'name' => 'MTK',
        //         'min' => 75,
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'BHS',
        //         'min' => 65,
        //     ],
        //     [
        //         'id' => 3,
        //         'name' => 'IPA',
        //         'min' => 70,
        //     ],
        // ]);
        // $dataTraining = collect([
        //     [
        //         'Nama' => 'Siswa1',
        //         'MTK' => 80,
        //         'BHS' => 70,
        //         'IPA' => 75,
        //         'status' => 2,
        //     ],
        //     [
        //         'Nama' => 'Siswa2',
        //         'MTK' => 65,
        //         'BHS' => 60,
        //         'IPA' => 55,
        //         'status' => 1,
        //     ],
        //     [
        //         'Nama' => 'Siswa3',
        //         'MTK' => 90,
        //         'BHS' => 85,
        //         'IPA' => 88,
        //         'status' => 2,
        //     ],
        //     [
        //         'Nama' => 'Siswa4',
        //         'MTK' => 55,
        //         'BHS' => 50,
        //         'IPA' => 60,
        //         'status' => 1,
        //     ],
        //     [
        //         'Nama' => 'Siswa5',
        //         'MTK' => 75,
        //         'BHS' => 70,
        //         'IPA' => 75,
        //         'status' => 2,
        //     ],
        //     [
        //         'Nama' => 'Siswa6',
        //         'MTK' => 75,
        //         'BHS' => 60,
        //         'IPA' => 75,
        //         'status' => 1,
        //     ],
        // ]);

        $participants = Participant::select('id', 'name', 'isPassed')->with(['participantScores' => function ($query) {
            $query->select('participant_id', 'score', 'study_id')->orderBy('study_id', 'asc');
        }])->get();
        $dataTraining = collect([]);
        foreach ($participants as $participant) {
            $participantScores = [];
            foreach ($participant->participantScores as $participantScore) {
                $participantScores['mapel-' . $participantScore->study_id] = $participantScore->score;
            }
            $status = $participant->isPassed;
            $dataTraining->push([
                'id' => $participant->id,
                'name' => $participant->name,
                'status' => $status,
                'status_text' => $status == 2 ? 'Lulus' : 'Tidak Lulus',
                ...$participantScores
            ]);
        }

        // Peng-kategori-an Data
        $kategoriData = $this->categorical($dataTraining, $studies);
        // return response()->json([
        //     "data" => $dataTraining->toArray(),
        //     "hasil" =>$kategoriData->toArray()
        // ]);
        // dd($kategoriData->toArray());

        // Probabilitas Kelas

        $totalSiswa = $kategoriData->count();
        $siswaLulus = $kategoriData->where('status', 2)->count();
        $siswaTidakLulus = $kategoriData->where('status', 1)->count();
        $p_lulus = $siswaLulus / $totalSiswa;
        $p_tidak_lulus = $siswaTidakLulus / $totalSiswa;

        // Probabilitas Kondisional
        $dataStatus = [2, 1];
        $dataNilaiStatus = [1, 0];
        $probabilitasCond = collect([]);
        foreach ($dataStatus as $status) {
            foreach ($studies as $study) {
                foreach ($dataNilaiStatus as $nilaiStatus) {
                    $studyKey = 'mapel-' . $study['id'];
                    $nilaiSiswaByStatus = $kategoriData->where('status', $status)->where($studyKey, $nilaiStatus)->count();
                    $jmlSiswaByStatus = $kategoriData->where('status', $status)->count();

                    $probabilitasCond->push([
                        'mapel' => $studyKey,
                        'nama_mapel' => $study['name'],
                        'nilai' => $nilaiStatus,
                        'status' => $status,
                        'nilaiSiswaByStatus' => $nilaiSiswaByStatus,
                        'jmlSiswaByStatus' => $jmlSiswaByStatus,
                        'probabilitas' => $nilaiSiswaByStatus / $jmlSiswaByStatus,
                    ]);
                }
            }
        }
        // dd($probabilitasCond->toArray());

        // prediksi siswa baru
        // $siswaBaru = collect([
        //     'MTK' => 50,
        //     'BHS' => 50,
        //     'IPA' => 80,
        // ]);

        // ubah menjadi categorical
        // foreach ($studies as $study) {
        //     $mapelName = $mapel['name'];
        //     $mapelValue = $siswaBaru[$mapelName];
        //     $siswaBaru[$mapelName] = $mapelValue > $mapel['min'] ? 1 : 0;
        // }

        $prediction = collect([]);
        foreach ($dataStatus as $d_status) {
            $probabilitas_status = $d_status == 2 ? $p_lulus : $p_tidak_lulus;
            $probabilitas_nilai = [];
            foreach ($nilaiSiswaBaru as $key => $value) {
                $probabilitas_nilai[] = $probabilitasCond->where('status', $d_status)->where('mapel', $key)->where('nilai', $value)->first()['probabilitas'];
            }

            $product_probabilitas_nilai = array_product($probabilitas_nilai);
            $prediction->push([
                'status' => $d_status,
                'status_text' => $d_status == 2 ? 'Lulus' : 'Tidak Lulus',
                'probabilitas' => $probabilitas_status * $product_probabilitas_nilai,
            ]);
        }


        return response()->json([
            'success' => 200,
            'siswa_baru' => $dataSiswaBaru,
            'data_nilai_siswa_baru' => $dataNilaiSiswaBaru,
            'prediksi' => $prediction,
        ]);
    }
}
