<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PurchaseController;
use App\Livewire\Pages\CategoryList;
use App\Livewire\Pages\ProductList;
use App\Livewire\Pages\PurchaseList;
use App\Livewire\Pages\UserList;
use Illuminate\Support\Facades\Route;

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

    Route::get('products', ProductList::class)->name('products.index');

    Route::get('categories', CategoryList::class)->name('categories.index');

    Route::get('users', UserList::class)->name('users.index');

    Route::get('purchases', PurchaseList::class)->name('purchases.index');
    Route::get('purchases/{purchase}/export-excel', [PurchaseController::class, 'exportExcel'])->name('purchases.export-excel');
    Route::get('purchases/{purchase}/export-pdf', [PurchaseController::class, 'exportPdf'])->name('purchases.export-pdf');
});
