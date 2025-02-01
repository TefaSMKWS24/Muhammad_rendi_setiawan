<?php

use Illuminate\Support\Facades\Route;

use App\Htpp\Controllers\BarangController;
use App\Htpp\Controllers\KasirController;
use App\Htpp\Controllers\KategoriController;
use App\Htpp\Controllers\TransaksiController;
use App\Htpp\Controllers\PelangganController;
use App\Htpp\Controllers\SupplierController;


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

// GUEST (SEBELUM LOGIN)
Route::middleware(['guest:kasir'])->group(function () {
    Route::get('/kasir', function () {return view('auth.loginkasir');})->name('loginkasir');
    Route::post('/loginkasir', [Authcontroller::class, 'loginkasir']);
});

Route::middleware(['guest.admin'])->group(function () {
    Route::get('/admin', function () {return view('auth.loginadmin');})->name('loginadmin');
    Route::post('/loginadmin', [Authcontroller::class, 'loginadmin']);
});

// AUTH (SETELAH LOGIN)
Route::middleware(['auth.kasir'])->group(function () {
    Route::get('/kasir/dashboard', [DashboardKasirController::class,'dashboard']);
    Route::get('/kasir/logout', [Authcontroller::class, 'logoutkasir']);
});

Route::middleware(['auth.admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardAdminController::class,'dashboard']);
    Route::get('/admin/logout', [Authcontroller::class, 'logoutkasir']);

    Route::resource('barang', BarangController::class);
    Route::resource('barang', KategoriController::class);
    Route::resource('barang', PelangganController::class);
    Route::resource('barang', KasirController::class);
    Route::resource('barang', TransaksiController::class);
    Route::resource('barang', SupplierController::class);

});

