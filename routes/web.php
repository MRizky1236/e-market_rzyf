<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/profile', [HomeController::class, 'profile']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/faq', [HomeController::class, 'faq']);
Route::resource('produk', ProdukController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('pemasok', PemasokController::class);
Route::resource('pengguna', PenggunaController::class);
Route::resource('barang', BarangController::class);
Route::get('/login', [UserController::class, 'index'])->name('login');

//login 
Route::get('/login', [UserController::class, 'index'])->name('login'); 
Route:: post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin'); 
Route::get('/logout', [UserController::class, 'logout'])->name('Logout');