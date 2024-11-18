<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


<<<<<<< HEAD
//ADMIN
// Route::get('/admin', [ProductController::class, 'index']);

// Route::post('/admin/product', [ProductController::class, 'store'])->name('admin.product.store');

// Route::get('/admin/product/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');

// Route::put('/admin/product/{id}', [ProductController::class, 'store'])->name('admin.product.update');

// Route::delete('/admin/product/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');

// Route::get('/admin/products/reload', [ProductController::class, 'reloadProducts'])->name('admin.products.reload');




// Admin
Route::view('/example-page', 'example-page');
Route::view('/example-auth', 'example-auth');
Route::view('example-frontend', 'example-frontend');

//login user
Route::view('/login-user', 'user.login-user')->name('login');

//Dashboatd user
Route ::view('/dashboard-user', 'user.dashboard-user')->name('dashboard');

//donation user
route ::View('/donation-user','user.donation-user')->name ('donation');

//about us user
Route ::view('/about-user','user.about-user')->name ('about');
=======
require __DIR__ . '/auth.php';
>>>>>>> 33-devlop-backend
