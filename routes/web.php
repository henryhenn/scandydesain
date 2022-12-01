<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('seluruh-desain', [HomeController::class, 'seluruhDesain'])->name('desain.index');

Route::get('desain/{product:id}', [HomeController::class, 'show'])->name('desain.detail');

Route::group([
    'middleware' => 'guest',
    'controller' => AuthController::class,
    'prefix' => 'auth',
], function () {
    Route::get('login', 'formLogin')->name('login');

    Route::post('login', 'authenticate')->name('login');

    Route::get('register', 'formRegister')->name('register');

    Route::post('register', 'store')->name('register');
});

Route::middleware('auth')->group(function () {
    Route::middleware('role:Admin')->group(function () {
        Route::get('dashboard', DashboardController::class)->name('dashboard');

        Route::resource('produk', ProductController::class);

        Route::delete('photo/{productimage:id}', [ProductController::class, 'deletePhoto'])->name('delete-photo');
    });

    Route::resource('produk-review', ProductReviewController::class)->except('createinde');

    Route::resource('wishlist', WishlistController::class);

    Route::resource('orders', OrderController::class)->only('index', 'store');

    Route::get('profil/edit', [AuthController::class, 'edit'])->name('profile.edit');

    Route::get('profil', [AuthController::class, 'profil'])->name('profile');

    Route::put('profil/{user:id}', [AuthController::class, 'update'])->name('profile.update');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

