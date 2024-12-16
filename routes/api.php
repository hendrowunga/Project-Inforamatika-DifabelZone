<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\CustomerRegisterController;

// Mendapatkan data pengguna yang terautentikasi
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Rute untuk registrasi pengguna baru
Route::post('/customer/register', [CustomerRegisterController::class, 'register'])
    ->middleware(['guest', 'throttle:60,1']) // Menggunakan throttle untuk proteksi dari brute force
    ->name('customer.register'); // Menambahkan nama rute untuk kemudahan pengelolaan

// Rute untuk login
Route::post('/customer/login', [LoginController::class, 'store'])
    ->middleware('guest') // Pastikan hanya guest yang dapat mengakses login
    ->name('login'); // Menambahkan nama rute untuk kemudahan pengelolaan

// Rute untuk logout (menghapus token autentikasi)
Route::post('/customer/logout', [LoginController::class, 'destroy'])
    ->middleware('auth:sanctum') // Hanya pengguna yang sudah login yang dapat logout
    ->name('logout'); // Nama rute logout





// require __DIR__ . '/auth.php';