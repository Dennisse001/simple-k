<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/surat/{id}/cetak', [SuratController::class, 'cetakPdf'])->name('surat.cetak');

    Route::resource('surat', SuratController::class);
});


Route::get('/penduduk', [KelurahanController::class, 'dataPenduduk']);

Route::resource('surat', SuratController::class);

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'show_login'])->name('login');
    Route::post('/login', [AuthController::class, 'processLogin'])->name('login.auth');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');
});





