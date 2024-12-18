<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\ParticipantScore;
use App\Models\Study;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParticipantScoreController extends Controller
{
    public function index()
    {
        $data = Participant::with(['participantScores' => fn ($query) =>
            $query->orderBy('study_id', 'asc')
        ])->has('participantScores')->latest()->get();

        $participants = Participant::orderBy('name', 'asc')->get();
        $studies = Study::orderBy('id', 'asc')->get();

        return view('data-training.index', compact('data', 'participants', 'studies'));
    }

    public function store(Request $request)
    {
        // messages validation
        $messages = [
            'participant_id.required' => 'Pilih peserta terlebih dahulu.',
            'participant_id.integer' => 'Pilih peserta terlebih dahulu.',
            'status.required' => 'Pilih status terlebih dahulu.',
            'status.integer' => 'Pilih status terlebih dahulu.',
            'note.string' => 'Catatan harus berupa teks.',
            'note.max' => 'Catatan maksimal 255 karakter.',
            'scores.required' => 'Isi nilai terlebih dahulu.',
            'scores.*.study_id.required' => 'Pilih mata pelajaran terlebih dahulu.',
            'scores.*.study_id.integer' => 'Pilih mata pelajaran terlebih dahulu.',
            'scores.*.score.required' => 'Isi nilai terlebih dahulu.',
            'scores.*.score.integer' => 'Nilai harus berupa angka.',
            'scores.*.score.min' => 'Nilai minimal 0.',
            'scores.*.score.max' => 'Nilai maksimal 100.',
        ];

        $validator = Validator::make($request->all(), [
            'participant_id' => 'required|integer',
            'status' => 'required|integer',
            'note' => 'nullable|string|max:255',
            'scores' => 'required|array',
            'scores.*.study_id' => 'required|integer',
            'scores.*.score' => 'required|integer|min:0|max:100',
        ], $messages);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $data = [];
            foreach ($request->scores as $score) {
                $data[] = [
                    'participant_id' => $request->participant_id,
                    'study_id' => $score['study_id'],
                    'score' => $score['score'],
                ];
            }

            // update participant
            $result = Participant::findOrFail($request->participant_id)->update([
                'isPassed' => (int) $request->status,
                'notes' => $request->note,
            ]);


            // update participant score
            $participantScore = ParticipantScore::where('participant_id', $request->participant_id)->get();
            if (count($participantScore) > 0) {
                foreach ($data as $key => $value) {
                    ParticipantScore::where('participant_id', $request->participant_id)
                        ->where('study_id', $value['study_id'])
                        ->update([
                            'score' => $value['score']
                        ]);
                }
            }else {
                ParticipantScore::insert($data);
            }

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan',
            ]);
        }catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // public function update(Request $request, string $id)
    // {
    //     // messages validation
    //     $messages = [
    //         'participant_id.required' => 'Pilih peserta terlebih dahulu.',
    //         'participant_id.integer' => 'Pilih peserta terlebih dahulu.',
    //         'status.required' => 'Pilih status terlebih dahulu.',
    //         'status.integer' => 'Pilih status terlebih dahulu.',
    //         'note.string' => 'Catatan harus berupa teks.',
    //         'note.max' => 'Catatan maksimal 255 karakter.',
    //         'scores.required' => 'Isi nilai terlebih dahulu.',
    //         'scores.*.study_id.required' => 'Pilih mata pelajaran terlebih dahulu.',
    //         'scores.*.study_id.integer' => 'Pilih mata pelajaran terlebih dahulu.',
    //         'scores.*.score.required' => 'Isi nilai terlebih dahulu.',
    //         'scores.*.score.integer' => 'Nilai harus berupa angka.',
    //         'scores.*.score.min' => 'Nilai minimal 0.',
    //         'scores.*.score.max' => 'Nilai maksimal 100.',
    //     ];

    //     $validator = Validator::make($request->all(), [
    //         'participant_id' => 'required|integer',
    //         'status' => 'required|integer',
    //         'note' => 'nullable|string|max:255',
    //         'scores' => 'required|array',
    //         'scores.*.study_id' => 'required|integer',
    //         'scores.*.score' => 'required|integer|min:0|max:100',
    //     ], $messages);

    //     //check if validation fails
    //     if ($validator->fails()) {
    //         return response()->json($validator->errors(), 422);
    //     }

    //     try {
    //         $data = [];
    //         foreach ($request->scores as $score) {
    //             $data[] = [
    //                 'participant_id' => $request->participant_id,
    //                 'study_id' => $score['study_id'],
    //                 'score' => $score['score'],
    //             ];
    //         }

    //         // update participant
    //         Participant::findOrFail($request->participant_id)->update([
    //             'status' => $request->status,
    //             'note' => $request->note,
    //         ]);

    //         // update participant score
    //         $participantScore = ParticipantScore::where('participant_id', $id)->get();
    //         if (count($participantScore) > 0) {
    //             ParticipantScore::where('participant_id', $id)->delete();
    //         }
    //         ParticipantScore::insert($data);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Data berhasil diupdate',
    //         ]);
    //     }catch (Exception $e) {
    //         return redirect()->back()->with('error', $e->getMessage());
    //     }
    // }

    public function destroy(string $id)
    {
        try {
            Participant::findOrFail($id)->update([
                'isPassed' => 0,
                'notes' => null
            ]);

            ParticipantScore::where('participant_id', $id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus',
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
}
