<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cart\cartController;
use App\Http\Controllers\User\Auth\ResetPasswordController;
use App\Http\Controllers\User\Auth\ForgotPasswordController;
use App\Http\Controllers\User\Auth\LoginController as UserLoginController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\User\Auth\LogoutController as UserLogoutController;
use App\Http\Controllers\Admin\Auth\LogoutController as AdminLogoutController;
use App\Http\Controllers\User\Auth\RegisterController as UserRegisterController;
use App\Http\Controllers\Admin\ProductsController;

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
        // Cart Routes
        Route::middleware('auth:sanctum')->prefix('cart')->group(function () {
            Route::post('/create', [cartController::class, 'create_cart']); // Membuat cart baru
            Route::get('/{cartId}', [cartController::class, 'view_cart']); // Melihat cart tertentu
            Route::delete('/{cartId}', [cartController::class, 'delete_cart']); // Menghapus cart tertentu

            Route::post('/{cartId}/product/add', [cartController::class, 'addProduct']); // Menambahkan produk ke dalam cart
            Route::put('/{cartId}/product/{productId}/update', [cartController::class, 'update_product']); // Memperbarui jumlah produk di dalam cart
            Route::delete('/{cartId}/product/{productId}', [cartController::class, 'removeProduct']); // Menghapus produk dari dalam cart
            Route::get('/{cartId}/products', [cartController::class, 'viewCartProducts']); // Melihat daftar produk dalam cart tertentu
        });
    });
});

// Route::prefix('admin')->middleware(['auth:sanctum'])->group(function () {
//     Route::prefix('manage-products')->name('api.products.')->group(function () {
//         Route::controller(ProductsController::class)->group(function () {
//             Route::get('/', 'index')->name('index');
//             Route::post('/store', 'store')->name('store');
//             Route::get('/{id}', 'show')->name('show');
//             Route::post('/update/{id}', 'update')->name('update');
//             Route::delete('/{id}', 'destroy')->name('destroy');
//         });
//     });
// });