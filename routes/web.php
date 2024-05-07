<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Models\Pembelian;
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

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'authenticate'])->name('login.authenticate');
});

Route::middleware('auth')->prefix('dashboard')->as('dashboard.')->group(function () {
    Route::get('/index', [DashboardController::class, 'index'])->name('index');

    Route::resource('produk', ProdukController::class);
    Route::resource('pembelian', Pembelian::class);
});
