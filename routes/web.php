<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

// home
Route::get('/', [HomeController::class, 'index']);

// detail book
Route::get('/buku/detail/{slug}', [HomeController::class, 'detail']);

// Auth
Route::get('/auth/login', [AuthController::class, 'login']);

Route::get('/auth/register', [AuthController::class, 'register']);

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

// siswa
Route::get('/dashboard/siswa', [SiswaController::class, 'index']);

Route::get('/dashboard/siswa/tambah', [SiswaController::class, 'create']);

Route::post('/dashboard/siswa/tambah', [SiswaController::class, 'store']);

Route::get('/dashboard/siswa/detail/{nisn}', [SiswaController::class, 'detail']);

// kelas
Route::get('/dashboard/kelas', [KelasController::class, 'index']);

Route::get('/dashboard/kelas/tambah', [KelasController::class, 'create']);

Route::get('/dashboard/kelas/detail/{kode_kelas}', [KelasController::class, 'detail']);

// buku
Route::get('/dashboard/buku', [BukuController::class, 'index']);

Route::get('/dashboard/buku/tambah', [BukuController::class, 'create']);

Route::get('/dashboard/buku/detail/{kode_buku}', [BukuController::class, 'detail']);

// buku
Route::get('/dashboard/kategori', [KategoriController::class, 'index']);

Route::get('/dashboard/kategori/tambah', [KategoriController::class, 'create']);

Route::get('/dashboard/kategori/detail/{slug}', [KategoriController::class, 'detail']);

// peminjaman
Route::get('/dashboard/peminjaman', [PeminjamanController::class, 'index']);

Route::get('/dashboard/peminjaman/tambah', [PeminjamanController::class, 'create']);

Route::get('/dashboard/peminjaman/detail/{id}', [PeminjamanController::class, 'detail']);

// pengembalian
Route::get('/dashboard/pengembalian', [PengembalianController::class, 'index']);

Route::get('/dashboard/pengembalian/tambah', [PengembalianController::class, 'create']);

Route::get('/dashboard/pengembalian/detail/{id}', [PengembalianController::class, 'detail']);