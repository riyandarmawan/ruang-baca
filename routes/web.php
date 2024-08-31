<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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

// kelas
Route::get('/dashboard/kelas', [KelasController::class, 'index']);

Route::get('/dashboard/kelas/tambah', [KelasController::class, 'create']);

// buku
Route::get('/dashboard/buku', [BukuController::class, 'index']);

Route::get('/dashboard/buku/tambah', [BukuController::class, 'create']);

// peminjaman
Route::get('/dashboard/peminjaman', [PeminjamanController::class, 'index']);

Route::get('/dashboard/peminjaman/tambah', [PeminjamanController::class, 'create']);

// pengembalian
Route::get('/dashboard/pengembalian', [PengembalianController::class, 'index']);

Route::get('/dashboard/pengembalian/tambah', [PengembalianController::class, 'create']);