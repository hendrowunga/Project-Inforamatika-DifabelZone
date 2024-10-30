<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\Auth\LogoutController as AdminLogoutController;
use App\Http\Controllers\User\Auth\LoginController as UserLoginController;
use App\Http\Controllers\User\Auth\LogoutController as UserLogoutController;
use App\Http\Controllers\User\Auth\RegisterController as UserRegisterController;
use App\Http\Controllers\User\Auth\ForgotPasswordController;
use App\Http\Controllers\User\Auth\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::prefix('user')->group(function () {
        Route::post('/register', [UserRegisterController::class, 'register']);
        Route::post('/login', [UserLoginController::class, 'login']);
        Route::post('/logout', [UserLogoutController::class, 'logout'])->middleware('auth:sanctum');

        // Password Reset Routes
        Route::post('/password/email', [ForgotPasswordController::class, 'forgotPassword'])->name('api.password.email');
        Route::post('/password/reset', [ResetPasswordController::class, 'resetPassword'])->name('api.password.update');
        Route::get('/password/reset', [ResetPasswordController::class, 'showResetForm'])->name('password.reset.form');
    });
});