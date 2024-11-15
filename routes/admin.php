<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;

Route::prefix('admin')->name('admin.')->group(function () {

    // Routes untuk tamu/admin yang belum login
    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'back.pages.admin.auth.login')->name('login');
        Route::post('/login_handler', [AdminController::class, 'loginHandler'])->name('login_handler');
        Route::view('/forgot-password', 'back.pages.admin.auth.forgot-password')->name('forgot-password');
        Route::post('/send-password-reset-link', [AdminController::class, 'sendPasswordResetLink'])->name('send-password-reset-link');
        Route::get('/password/reset/{token}', [AdminController::class, 'resetPassword'])->name('reset-password');
        Route::post('/reset-password-handler', [AdminController::class, 'resetPasswordHandler'])->name('reset-password-handler');
    });

    // Routes untuk admin yang sudah login
    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
        Route::view('/home', 'back.pages.admin.home')->name('home');
        Route::post('/logout_handler', [AdminController::class, 'logoutHandler'])->name('logout_handler');
        Route::get('/profile', [AdminController::class, 'profileView'])->name('profile');
        Route::post('/change-profile-picture', [AdminController::class, 'changeProfilePicture'])->name('change-profile-picture');
        Route::view('/settings', 'back.pages.settings')->name('settings');
        Route::post('/change-logo', [AdminController::class, 'changeLogo'])->name('change-logo');
        Route::post('/change-favicon', [AdminController::class, 'changeFavicon'])->name('change-favicon');

        //CATEGORIES
        Route::prefix('manage-categories')->name('manage-categories.')->group(function () {
            Route::controller(CategoriesController::class)->group(function () {
                Route::get('/', 'catSubcatList')->name('cats-subcats-list');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/update/{id}', 'update')->name('update');
                Route::get('/show/{id}', 'show')->name('show');
                Route::delete('/destroy/{id}', 'destroy')->name('destroy');
            });
        });

        // PRODUCTS
        Route::prefix('manage-products')->name('manage-products.')->group(function () {
            Route::controller(ProductsController::class)->group(function () {
                Route::get('/', 'productsList')->name('product_list');
                Route::get('/createProduct', 'createProduct')->name('product_create');
                Route::post('/store', 'storeProduct')->name('product_store');
                Route::get('/edit/{id}', 'editProduct')->name('product_edit');
                Route::post('/update/{id}', 'updateProduct')->name('product_update');
                Route::get('/show/{id}', 'showProduct')->name('view_product');
                Route::delete('/destroy/{id}', 'destroyProduct')->name('product_destroy');
            });
        });
        // User
        Route::prefix('manage-users')->name('manage-users.')->group(function () {
            Route::controller(UserController::class)->group(function () {
                Route::get('/', 'listUser')->name('user_list');
                Route::get('/create', 'createUser')->name('user_create');
                Route::post('/store', 'storeUser')->name('user_store');
                Route::get('/edit/{id}', 'editUser')->name('user_edit');
                Route::post('/update/{id}', 'updateUser')->name('user_update');
                Route::get('/show/{id}', 'showUser')->name('user_show');
                Route::delete('/destroy/{id}', 'destroyUser')->name('user_destroy');
            });
        });
        Route::prefix('manage-orders')->name('manage-orders.')->group(function () {
            Route::controller(OrderController::class)->group(function () {
                Route::get('/', 'orderList')->name('order_list');           // Menampilkan semua order
                Route::get('/create', 'createOrders')->name('order_create');   // Form buat order
                Route::post('/store', 'storeOrder')->name('order_store');
                Route::get('/edit/{id}', 'editOrder')->name('order_edit');
                Route::post('/update/{id}', 'updateOrder')->name('order_update');
                Route::get('/show/{id}', 'showOrder')->name('order_show');
                Route::delete('/destroy/{id}', 'destroyOrder')->name('order_destroy');
                Route::get('/filter', 'filterOrders')->name('order_filter');
            });
        });
    });
});
