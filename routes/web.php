<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/locale/{lang}', [LocalizationController::class, 'index'])->name('locale');

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'authenticate'])->name('login.authenticate');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'request'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'email'])->name('password.email');
    Route::get('/forgot-password/{token}', [ForgotPasswordController::class, 'reset'])->name('password.reset');
    Route::post('/forgot-password/{token}', [ForgotPasswordController::class, 'update'])->name('password.update');
});

Route::middleware('auth')->prefix('dashboard')->as('dashboard.')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/index', [DashboardController::class, 'index'])->name('index');

    Route::resource('products', ProductController::class)->except('show');

    Route::resource('categories', CategoryController::class)->except('show');

    Route::resource('users', UserController::class)->except('show');

    Route::get('purchases', [PurchaseController::class, 'index'])->name('purchases.index');
    Route::get('purchases/{purchase}', [PurchaseController::class, 'show'])->name('purchases.show');
    Route::get('purchases/{purchase}/export', [PurchaseController::class, 'export'])->name('purchases.export');
});
