<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\LoginController;
// use App\Http\Controllers\ProfileController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:customer', 'verified'])->name('dashboard');

Route::middleware('auth:customer')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Dashboatd user
Route::view('/dashboard-user', 'user.dashboard-user')->name('dashboard');

//donation user
route::View('/donation-user', 'user.donation-user')->name('donation');

//about us user
Route::view('/about-user', 'user.about-user')->name('about');


require __DIR__ . '/auth.php';

//register user
// // Route ::view('/register-user','user.register-user')->name ('register');
// Route::get('/register-user', [RegisterController::class, 'showRegisterForm'])->name('register');
// Route::post('/register-user', [RegisterController::class, 'register']);

// // Halaman login
// Route::get('/login-user', [LoginController::class, 'showLoginForm'])->name('login');

// // Proses login
// Route::post('/login-user', [LoginController::class, 'login'])->name('login.submit');

//keranjang
Route ::view('/cart-user','user.cart-user')->name ('keranjang');

// Menampilkan profil user
Route::get('/profile/{id}', [ProfileController::class, 'showProfile'])->name('profile.show');

// Menambahkan alamat baru
Route::post('/profile/{id}/add-address', [ProfileController::class, 'addAddress'])->name('profile.addAddress');

