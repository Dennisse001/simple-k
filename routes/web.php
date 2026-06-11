<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\SuratController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/penduduk', [KelurahanController::class, 'dataPenduduk']);
Route::resource('surat', SuratController::class);





// Route::get('/surat', [KelurahanController::class, 'daftarSurat'])->name('surat');
