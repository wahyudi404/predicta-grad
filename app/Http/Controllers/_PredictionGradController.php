<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Study;
use DivisionByZeroError;
use Illuminate\Http\Request;

class _PredictionGradController extends Controller
{
    protected function calcuMean($data, $column, $status)
    {
        // filters by status
        $x = $data->filter(function ($item) use ($status) {
            return $item['status'] == $status;
        });
        $sumByColumn = $x->sum($column);
        $countData = $x->count();
        $mean = $sumByColumn / $countData;
        return round($mean, 2);
    }

    protected function calcuStandarDeviasi($data, $column, $status, $mean)
    {
        // filters by status
        $x = $data->filter(function ($item) use ($status) {
            return $item['status'] == $status;
        });

        $x_mean = [];
        foreach ($x->toArray() as $item) {
            $x_mean[] = $item[$column] - $mean;
        }

        $x_mean_kuadrat = [];
        foreach ($x_mean as $item) {
            $x_mean_kuadrat[] = $item * $item;
        }

        $jmlh_x_mean_kuadrat = array_sum($x_mean_kuadrat);
        $n = $x->count();
        $sd = sqrt($jmlh_x_mean_kuadrat / ($n - 1));
        // dd($x->toArray(), $x_mean, $x_mean_kuadrat, $jmlh_x_mean_kuadrat, round($sd, 2));
        return round($sd, 2);
    }

    // Rumus Gaussian Probability Density Function
    // f(x) = (1 / (σ * √(2π))) * e^(-(x-μ)² / (2σ²))
    // protected function calcuGaussianProbability($x, $mean, $sd)
    // {
    //     return (1 / ($sd * sqrt(2 * 3.14))) * exp(-pow($x - $mean, 2) / (2 * pow($sd, 2)));
    // }

    protected function normalDistribution($x, $mean, $stdDev) {
        // Konstanta PI
        $pi = pi();

        // Hitung pembilang
        $numerator = exp(-pow($x - $mean, 2) / (2 * pow($stdDev, 2)));

        // Hitung penyebut
        $denominator = (1 / ($stdDev * sqrt(2 * $pi)));

        // Hitung f(x)
        return $denominator * $numerator;
    }

    public function index()
    {
        // data training collection
        // $mapel = collect(['matematika', 'bahasa', 'kehadiran']);
        // $dataTraining = collect([
        //     [
        //         'no' => 1,
        //         'matematika' => 85,
        //         'bahasa' => 80,
        //         'kehadiran' => 90,
        //         'ekstrakurikuler' => 'Ya',
        //         'status' => 'Lulus',
        //     ],
        //     [
        //         'no' => 2,
        //         'matematika' => 65,
        //         'bahasa' => 70,
        //         'kehadiran' => 70,
        //         'ekstrakurikuler' => 'Tidak',
        //         'status' => 'Tidak',
        //     ],
        //     [
        //         'no' => 3,
        //         'matematika' => 75,
        //         'bahasa' => 85,
        //         'kehadiran' => 85,
        //         'ekstrakurikuler' => 'Ya',
        //         'status' => 'Lulus',
        //     ],
        //     [
        //         'no' => 4,
        //         'matematika' => 55,
        //         'bahasa' => 60,
        //         'kehadiran' => 60,
        //         'ekstrakurikuler' => 'Tidak',
        //         'status' => 'Tidak',
        //     ],
        //     [
        //         'no' => 5,
        //         'matematika' => 90,
        //         'bahasa' => 95,
        //         'kehadiran' => 95,
        //         'ekstrakurikuler' => 'Ya',
        //         'status' => 'Lulus',
        //     ],
        //     [
        //         'no' => 6,
        //         'matematika' => 70,
        //         'bahasa' => 75,
        //         'kehadiran' => 80,
        //         'ekstrakurikuler' => 'Ya',
        //         'status' => 'Lulus',
        //     ],
        //     [
        //         'no' => 7,
        //         'matematika' => 80,
        //         'bahasa' => 85,
        //         'kehadiran' => 85,
        //         'ekstrakurikuler' => 'Tidak',
        //         'status' => 'Lulus',
        //     ],
        //     [
        //         'no' => 8,
        //         'matematika' => 60,
        //         'bahasa' => 65,
        //         'kehadiran' => 75,
        //         'ekstrakurikuler' => 'Tidak',
        //         'status' => 'Tidak',
        //     ],
        //     [
        //         'no' => 9,
        //         'matematika' => 95,
        //         'bahasa' => 90,
        //         'kehadiran' => 95,
        //         'ekstrakurikuler' => 'Ya',
        //         'status' => 'Lulus',
        //     ],
        //     [
        //         'no' => 10,
        //         'matematika' => 50,
        //         'bahasa' => 55,
        //         'kehadiran' => 50,
        //         'ekstrakurikuler' => 'Tidak',
        //         'status' => 'Tidak',
        //     ],
        // ]);

        $mapel = Study::orderBy('id', 'asc')->pluck('id');
        $participants = Participant::select('id', 'name', 'isPassed')->with(['participantScores' => fn ($query) =>
            $query->select('participant_id', 'study_id', 'score')->orderBy('study_id', 'asc')
        ])->get();

        $dataTraining = collect([]);
        foreach ($participants as $participant) {
            // 2: Lulus, 1: Tidak Lulus
            $nilai = [];
            foreach ($mapel as $mp) {
                $nilai['mapel_' . $mp] = $participant->participantScores->where('study_id', $mp)->first()->score;
            }
            // dd($nilai);
            $dataTraining->push([
                'participant_id' => $participant->id,
                'name' => $participant->name,
                'isPassed' => $participant->isPassed,
                'status' => $participant->isPassed == 2 ? 'Lulus' : 'Tidak',
                ...$nilai
            ]);
        }

        // menghitung prior probability
        $count_data_lulus = count($dataTraining->filter(fn($value) => $value['status'] == 'Lulus'));
        $count_data_tidak_lulus = count($dataTraining->filter(fn($value) => $value['status'] == 'Tidak'));
        $count_data = count($dataTraining);
        $prior_lulus = $count_data_lulus / $count_data;
        $prior_tidak_lulus = $count_data_tidak_lulus / $count_data;

        // Menghitung Mean dan Standar Deviasi untuk setiap fitur numerik
        // Untuk Lulus
        $dataMeanAndStanDev = collect([]);
        $status = ['Lulus', 'Tidak'];
        foreach ($status as $sts) {
            foreach ($mapel as $mp) {
                $mp = 'mapel_' . $mp;
                $mean = $this->calcuMean($dataTraining, $mp, $sts);
                $standar_deviasi = $this->calcuStandarDeviasi($dataTraining, $mp, $sts, $mean);
                $dataMeanAndStanDev[] = [
                    'mapel' => $mp,
                    'mean' => $mean,
                    'standar_deviasi' => $standar_deviasi,
                    'status' => $sts
                ];
            }
        }

        // $siswaBaru = [
        //     'no' => 11,
        //     'matematika' => 85,
        //     'bahasa' => 80,
        //     'kehadiran' => 90,
        //     'ekstrakurikuler' => 'Ya',
        // ];

        $siswaBaru = [
            "participant_id" => 1,
            "name" => "Bintang Dwi Jelita",
            "mapel_1" => 0.0,
            "mapel_2" => 0.0,
            "mapel_3" => 0.0,
            "mapel_4" => 0.0,
            "mapel_5" => 0.0,
            "mapel_6" => 0.0,
            "mapel_7" => 0.8,
            "mapel_8" => 0.2,
        ];

        $likelihood = collect([]);
        foreach ($status as $sts) {
            foreach ($mapel as $mp) {
                $mp = 'mapel_' . $mp;
                $x = $siswaBaru[$mp];

                $mean = $dataMeanAndStanDev->first(function($value) use ($mp, $sts) {
                    return $value['mapel'] == $mp && $value['status'] == $sts;
                })['mean'];

                $sd = $dataMeanAndStanDev->first(function ($value) use ($mp, $sts) {
                    return $value['mapel'] == $mp && $value['status'] == $sts;
                })['standar_deviasi'];

                $likelihood[] = [
                    'mapel' => $mp,
                    'likelihood' => $this->normalDistribution($x, $mean, $sd),
                    'status' => $sts
                ];
            }
        }

        $resultLikelihood = collect([]);
        foreach ($status as $sts) {
            $prior = ($sts == 'Lulus') ? $prior_lulus : $prior_tidak_lulus;
            $hasil = $prior;
            foreach ($likelihood->toArray() as $item) {
                if ($item['status'] == $sts) {
                    $hasil *= $item['likelihood'];
                }
            }
            $resultLikelihood[] = [
                'status' => $sts,
                'hasil' => $hasil
            ];
        }

        // normalisasi hasil
        $normalisasiHasil = collect([]);
        foreach ($resultLikelihood as $item) {
            $not = $resultLikelihood->first(function ($value) use ($item) {
                return $value['status'] != $item['status'];
            });

            try {
                $hasil = $item['hasil'] / ($item['hasil'] + $not['hasil']);
            } catch (DivisionByZeroError $e) {
                $hasil = 0;
            }

            $normalisasiHasil[] = [
                'status' => $item['status'],
                'hasil' => round($hasil, 2),
            ];
        }

        // kesimpulan
        dd($normalisasiHasil->toArray());

        return view('prediksi-kelulusan.index', compact('dataTraining'));
    }
}
