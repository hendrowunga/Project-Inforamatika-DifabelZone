<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// Grup rute untuk registrasi dan login (akses publik)
Route::prefix('auth')->group(function () {

    // Rute untuk registrasi pengguna baru (Customer)
    Route::post('/register', [RegisteredUserController::class, 'store']);

    // Rute untuk login pengguna (Customer)
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    // Rute untuk mengirimkan link reset password
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store']);

    // Rute untuk mereset password pengguna
    Route::post('/reset-password', [NewPasswordController::class, 'store']);
});

// Grup rute untuk autentikasi yang membutuhkan token (akses terlindungi dengan Sanctum)
Route::middleware('auth:sanctum')->group(function () {

    // Rute untuk logout (revoke token pengguna)
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);

    // Rute untuk mengonfirmasi password saat melakukan perubahan sensitif
    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Rute untuk mengirimkan ulang notifikasi verifikasi email
    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store']);

    // Rute untuk menampilkan tampilan verifikasi email
    Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke']);

    // Rute untuk memperbarui password pengguna yang sudah login
    Route::post('/update-password', [PasswordController::class, 'update']);

    // Rute untuk verifikasi email pengguna
    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->name('verification.verify');
});

// Rute untuk verifikasi email, tanpa autentikasi (akses publik)
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->name('verification.verify');
