<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UkuranPelangganController;
use App\Http\Controllers\PesananController;

Route::get('/matakuliah', [MatakuliahController::class, 'index']);

Route::get('/matakuliah/show/{kode?}', [MatakuliahController::class, 'show']);

//admin
Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');

Route::resource('pelanggan', PelangganController::class);
Route::resource('ukuran', UkuranPelangganController::class);
Route::resource('pesanan', PesananController::class);

//guest
Route::get('/guest', [GuestController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');
        Route::get('/home', function () {
    return view('home');
});
