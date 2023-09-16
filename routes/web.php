<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\IndikatorKognitifController;
use App\Http\Controllers\IndikatorNAMController;
use App\Http\Controllers\IndikatorSeniController;
use App\Http\Controllers\IndikatorSosemController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\Profile_SekolahController;
use App\Http\Controllers\SiswaController;
use App\Models\IndikatorKognitif;
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
    return view('dashboard.index')->with(['url' => 'Dashboard']);
});

// route profile sekolah
Route::resource('/Profile-Sekolah', Profile_SekolahController::class);

// route kelas
Route::resource('/Kelas', KelasController::class);

// route guru
Route::resource('/Guru',GuruController::class); 

// route siswa
Route::resource('Siswa',SiswaController::class);

// route indikator NAM
Route::resource('/IndikatorNAM',IndikatorNAMController::class);

// route indikator Kognitif
Route::resource('/IndikatorKognitif',IndikatorKognitifController::class);

// route indikator Seni
Route::resource('/IndikatorSeni',IndikatorSeniController::class);

// route indikator Sosem
Route::resource('/IndikatorSosem',IndikatorSosemController::class);