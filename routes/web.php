<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['splade'])->group(function () {
    Route::get('/', fn () => view('home'))->name('home');
    Route::get('/docs', fn () => view('docs'))->name('docs');

    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    //products
    Route::get('/products', function () {
        return view('user.product-user');
    });
});

//login user
// Route::view('/login-user', 'user.login-user')->name('login');

//Dashboatd user
Route ::view('/dashboard-user', 'user.dashboard-user')->name('dashboard');

//donation user
route ::View('/donation-user','user.donation-user')->name ('donation');

//about us user
Route ::view('/about-user','user.about-user')->name ('about');

//register user
// Route ::view('/register-user','user.register-user')->name ('register');
Route::get('/register-user', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register-user', [RegisterController::class, 'register']);

// Halaman login
Route::get('/login-user', [LoginController::class, 'showLoginForm'])->name('login');

// Proses login
Route::post('/login-user', [LoginController::class, 'login'])->name('login.submit');

//keranjang
Route ::view('/cart-user','user.cart-user')->name ('keranjang');