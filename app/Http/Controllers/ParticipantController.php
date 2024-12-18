<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Study;
use Exception;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index()
    {
        $data = Participant::latest()->get();
        $studies = Study::orderBy('id', 'asc')->get();
        return view('peserta.index', compact('data', 'studies'));
    }

    public function participantScores(string $id)
    {
        $data = Participant::with(['participantScores' => fn ($query) =>
        $query->orderBy('study_id', 'asc')
        ])->findOrFail($id);
        return response()->json([
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        // messages validation
        $messages = [
            'name.required' => 'Nama harus diisi',
            'origin_of_institution.required' => 'Asal lembaga harus diisi',
            'address.required' => 'Alamat harus diisi',
        ];

        // validation request
        $request->validateWithBag('post', [
            'name' => 'required|string',
            'origin_of_institution' => 'required|string',
            'address' => 'required|string',
        ], $messages);

        try {
            Participant::create([
                'name' => $request->name,
                'origin_of_institution' => $request->origin_of_institution,
                'address' => $request->address
            ]);

            return redirect()->route('peserta')->with('success', 'Data berhasil disimpan');
        } catch (Exception $e) {
            return redirect()->route('peserta')->with('error', 'Data gagal disimpan');
        }
    }

    public function update(Request $request, string $id)
    {
        // messages validation
        $messages = [
            'name.required' => 'Nama harus diisi',
            'origin_of_institution.required' => 'Asal lembaga harus diisi',
            'address.required' => 'Alamat harus diisi',
        ];

        // validation request
        $request->validateWithBag('post', [
            'name' => 'required|string',
            'origin_of_institution' => 'required|string',
            'address' => 'required|string',
        ], $messages);

        try {
            $peserta = Participant::findOrFail($id);
            $peserta->update([
                'name' => $request->name,
                'origin_of_institution' => $request->origin_of_institution,
                'address' => $request->address
            ]);
            return redirect()->route('peserta')->with('success', 'Data berhasil diupdate');
        } catch (Exception $e) {
            return redirect()->route('peserta')->with('error', 'Data gagal diupdate');
        }
    }

    public function destroy(string $id)
    {
        try {
            $peserta = Participant::findOrFail($id);
            $peserta->delete();
            return redirect()->route('peserta')->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->route('peserta')->with('error', 'Data gagal dihapus');
        }
    }
}
