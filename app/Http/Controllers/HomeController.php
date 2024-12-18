<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Study;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pengguna = User::count();
        $peserta = Participant::count();
        $mata_pelajaran = Study::count();
        $data_training = Participant::has('participantScores')->count();

        // dd($pengguna, $peserta, $mata_pelajaran, $data_training);

        return view('home', compact('pengguna', 'peserta', 'mata_pelajaran', 'data_training'));
    }
}
