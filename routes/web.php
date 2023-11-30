<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PenjualanController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('home');
});

Route::get('pemasok', [PemasokController::class, 'index']);

Route::post('pemasok', [PemasokController::class, 'store']);

Route::get('pemasok/{id}', [PemasokController::class, 'edit']);

Route::put('pemasok/{id}', [PemasokController::class, 'update']);

Route::delete('pemasok/{id}', [PemasokController::class, 'destroy']);

Route::get('add_pemasok', [PemasokController::class, 'form_add']);

Route::get('pelanggan', [PelangganController::class, 'index']);

Route::post('pelanggan', [PelangganController::class, 'store']);

Route::get('pelanggan/{id}', [PelangganController::class, 'edit']);

Route::put('pelanggan/{id}', [PelangganController::class, 'update']);

Route::delete('pelanggan/{id}', [PelangganController::class, 'destroy']);

Route::get('barang', [BarangController::class, 'index']);

Route::post('barang', [BarangController::class, 'store']);

Route::get('add_barang', [BarangController::class, 'form_add']);

Route::get('barang/{id}', [BarangController::class, 'edit']);

Route::put('barang/{id}', [BarangController::class, 'update']);

Route::delete('barang/{id}', [BarangController::class, 'destroy']);

Route::get('penjualan', [PenjualanController::class, 'index']);

Route::post('penjualan', [PenjualanController::class, 'store']);

Route::get('penjualan/{id}', [PenjualanController::class, 'edit']);

Route::put('penjualan/{id}', [PenjualanController::class, 'update']);

Route::get('add_penjualan', [PenjualanController::class, 'form_add_penjualan']);

Route::get('add_pelanggan', [PenjualanController::class, 'form_add_pelanggan']);

Route::delete('penjualan/{id}', [PenjualanController::class, 'destroy']);
