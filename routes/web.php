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

Route::resource('barang', BarangController::class);
Route::resource('barang', KategoriController::class);
Route::resource('barang', PelangganController::class);
Route::resource('barang', KasirController::class);
Route::resource('barang', TransaksiController::class);
Route::resource('barang', SupplierController::class);
