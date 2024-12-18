<?php

use App\Http\Controllers\PredictionGradController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// pengguna
Route::get('/pengguna', [App\Http\Controllers\UserController::class, 'index'])->name('pengguna');
Route::post('/pengguna', [App\Http\Controllers\UserController::class, 'store'])->name('pengguna.store');
Route::put('/pengguna/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('pengguna.update');
Route::delete('/pengguna/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('pengguna.destroy');

// peserta
Route::get('/peserta', [App\Http\Controllers\ParticipantController::class, 'index'])->name('peserta');
Route::post('/peserta', [App\Http\Controllers\ParticipantController::class, 'store'])->name('peserta.store');
Route::put('/peserta/{id}', [App\Http\Controllers\ParticipantController::class, 'update'])->name('peserta.update');
Route::delete('/peserta/{id}', [App\Http\Controllers\ParticipantController::class, 'destroy'])->name('peserta.destroy');
Route::get('/peserta/{id}/nilai', [App\Http\Controllers\ParticipantController::class, 'participantScores'])->name('peserta.nilai');

// mata pelajaran
Route::get('/mata-pelajaran', [App\Http\Controllers\StudyController::class, 'index'])->name('mata-pelajaran');
Route::post('/mata-pelajaran', [App\Http\Controllers\StudyController::class, 'store'])->name('mata-pelajaran.store');
Route::put('/mata-pelajaran/{id}', [App\Http\Controllers\StudyController::class, 'update'])->name('mata-pelajaran.update');
Route::delete('/mata-pelajaran/{id}', [App\Http\Controllers\StudyController::class, 'destroy'])->name('mata-pelajaran.destroy');

// data training
Route::get('/data-training', [App\Http\Controllers\ParticipantScoreController::class, 'index'])->name('data-training');
Route::post('/data-training', [App\Http\Controllers\ParticipantScoreController::class, 'store'])->name('data-training.store');
// Route::put('/data-training/{id}', [App\Http\Controllers\ParticipantScoreController::class, 'update'])->name('data-training.update');
Route::delete('/data-training/{id}', [App\Http\Controllers\ParticipantScoreController::class, 'destroy'])->name('data-training.destroy');

// prediksi kelulusan
Route::get('/prediksi-kelulusan', [PredictionGradController::class, 'index'])->name('prediksi-kelulusan');
Route::post('/prediksi-kelulusan', [PredictionGradController::class, 'naiveBayes'])->name('naive-bayes');
