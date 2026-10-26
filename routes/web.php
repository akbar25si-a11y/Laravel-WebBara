<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UkuranPelangganController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/matakuliah', [MatakuliahController::class, 'index']);

Route::get('/matakuliah/show/{kode?}', [MatakuliahController::class, 'show']);

//admin
Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');

Route::resource('pelanggan', PelangganController::class);
Route::resource('ukuran', UkuranPelangganController::class);
Route::resource('pesanan', PesananController::class);
Route::resource('user', UserController::class);

//guest
Route::get('/guest', [GuestController::class, 'index'])->name('guest.dashboard');

Route::get('/', [AuthController::class, 'home'])->name('home.guest');
Route::get('/auth', [AuthController::class, 'showLogin'])->name('login');
Route::post('/auth', [AuthController::class, 'login'])->name('login.process');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');
        Route::get('/home', function () {
    return view('home');
});
