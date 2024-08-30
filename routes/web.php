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

// kelas
Route::get('/dashboard/kelas', [KelasController::class, 'index']);

// buku
Route::get('/dashboard/buku', [BukuController::class, 'index']);

// peminjaman
Route::get('/dashboard/peminjaman', [PeminjamanController::class, 'index']);

// pengembalian
Route::get('/dashboard/pengembalian', [PengembalianController::class, 'index']);