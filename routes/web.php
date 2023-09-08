<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\Profile_SekolahController;
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