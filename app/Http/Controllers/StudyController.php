<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Exception;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    public function index()
    {
        $data = Study::latest()->get();

        return view('mata-pelajaran.index', compact('data'));
    }

    public function store(Request $request)
    {
        // messages validation
        $messages = [
            'name.required' => 'Nama harus diisi',
            'min.required' => 'Nilai minimal harus diisi',
            'max.required' => 'Nilai maksimal harus diisi',
            'min.numeric' => 'Nilai minimal harus berupa angka',
            'max.numeric' => 'Nilai maksimal harus berupa angka',
        ];

        // validation request
        $request->validateWithBag('post', [
            'name' => 'required|string',
            'min' => 'required|numeric',
            'max' => 'required|numeric',
        ], $messages);

        try {
            Study::create([
                'name' => $request->name,
                'min' => $request->min,
                'max' => $request->max
            ]);

            return redirect()->route('mata-pelajaran')->with('success', 'Data berhasil disimpan');
        } catch (Exception $e) {
            return redirect()->route('mata-pelajaran')->with('error', 'Data gagal disimpan');
        }
    }

    public function update(Request $request, string $id)
    {
        // messages validation
        $messages = [
            'name.required' => 'Nama harus diisi',
            'min.required' => 'Nilai minimal harus diisi',
            'max.required' => 'Nilai maksimal harus diisi',
            'min.numeric' => 'Nilai minimal harus berupa angka',
            'max.numeric' => 'Nilai maksimal harus berupa angka',
        ];

        // validation request
        $request->validateWithBag('post', [
            'name' => 'required|string',
            'min' => 'required|numeric',
            'max' => 'required|numeric',
        ], $messages);

        try {
            $mapel = Study::findOrFail($id);
            $mapel->update([
                'name' => $request->name,
                'min' => $request->min,
                'max' => $request->max
            ]);
            return redirect()->route('mata-pelajaran')->with('success', 'Data berhasil diupdate');
        } catch (Exception $e) {
            return redirect()->route('mata-pelajaran')->with('error', 'Data gagal diupdate');
        }
    }

    public function destroy(string $id)
    {
        try {
            $mapel = Study::findOrFail($id);
            $mapel->delete();
            return redirect()->route('mata-pelajaran')->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->route('mata-pelajaran')->with('error', 'Data gagal dihapus');
        }
    }
}
