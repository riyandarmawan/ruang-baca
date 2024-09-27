<?php

use App\Http\Controllers\ApiControler;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// home
Route::get('/', [HomeController::class, 'index']);

// detail book
Route::get('/buku/detail/{slug}', [HomeController::class, 'detail']);

// Auth
Route::get('/auth/login', [AuthController::class, 'login'])->name('login');

Route::post('/auth/login', [AuthController::class, 'attemptLogin'])->middleware('throttle:5,1');

Route::get('/auth/register', [AuthController::class, 'register']);

Route::post('/auth/register', [AuthController::class, 'attemptRegister'])->middleware('throttle:5,1');

Route::post('/auth/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function () {

    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // user
    Route::get('/dashboard/user/profile', [UserController::class, 'show']);

    Route::post('/dashboard/user/ubah/{username}', [UserController::class, 'update']);

    Route::post('/dashboard/user/ubah-password/{username}', [UserController::class, 'changePassword']);

    Route::post('/dashboard/user/hapus/{username}', [UserController::class, 'destroy']);

    // siswa
    Route::get('/dashboard/siswa', [SiswaController::class, 'index']);

    Route::get('/dashboard/siswa/tambah', [SiswaController::class, 'create']);

    Route::post('/dashboard/siswa/tambah', [SiswaController::class, 'store']);

    Route::get('/dashboard/siswa/detail/{nisn}', [SiswaController::class, 'detail']);

    Route::post('/dashboard/siswa/ubah/{nisn}', [SiswaController::class, 'update']);

    Route::post('/dashboard/siswa/hapus/{nisn}', [SiswaController::class, 'destroy']);

    // kelas
    Route::get('/dashboard/kelas', [KelasController::class, 'index']);

    Route::get('/dashboard/kelas/tambah', [KelasController::class, 'create']);

    Route::post('/dashboard/kelas/tambah', [KelasController::class, 'store']);

    Route::get('/dashboard/kelas/detail/{kode_kelas}', [KelasController::class, 'detail']);

    Route::post('/dashboard/kelas/ubah/{kode_kelas}', [KelasController::class, 'update']);

    Route::post('/dashboard/kelas/hapus/{kode_kelas}', [KelasController::class, 'destroy']);

    // buku
    Route::get('/dashboard/buku', [BukuController::class, 'index']);

    Route::get('/dashboard/buku/tambah', [BukuController::class, 'create']);

    Route::post('/dashboard/buku/tambah', [BukuController::class, 'store']);

    Route::get('/dashboard/buku/detail/{slug}', [BukuController::class, 'detail']);

    Route::post('/dashboard/buku/ubah/{slug}', [BukuController::class, 'update']);

    Route::post('/dashboard/buku/hapus/{slug}', [BukuController::class, 'destroy']);

    // Kategori
    Route::get('/dashboard/kategori', [KategoriController::class, 'index']);

    Route::get('/dashboard/kategori/tambah', [KategoriController::class, 'create']);

    Route::post('/dashboard/kategori/tambah', [KategoriController::class, 'store']);

    Route::get('/dashboard/kategori/detail/{slug}', [KategoriController::class, 'detail']);

    Route::post('/dashboard/kategori/ubah/{slug}', [KategoriController::class, 'update']);

    Route::post('/dashboard/kategori/hapus/{slug}', [KategoriController::class, 'destroy']);

    // peminjaman
    Route::get('/dashboard/peminjaman', [PeminjamanController::class, 'index']);

    Route::get('/dashboard/peminjaman/tambah', [PeminjamanController::class, 'create']);

    Route::post('/dashboard/peminjaman/tambah', [PeminjamanController::class, 'store']);

    Route::get('/dashboard/peminjaman/detail/{id}', [PeminjamanController::class, 'detail']);

    Route::post('/dashboard/peminjaman/ubah/{id}', [PeminjamanController::class, 'update']);

    Route::post('/dashboard/peminjaman/hapus/{id}', [PeminjamanController::class, 'destroy']);

    // pengembalian
    Route::get('/dashboard/pengembalian', [PengembalianController::class, 'index']);

    Route::get('/dashboard/pengembalian/tambah', [PengembalianController::class, 'create']);

    Route::get('/dashboard/pengembalian/detail/{id}', [PengembalianController::class, 'detail']);

    Route::post('/dashboard/pengembalian/tambah', [PengembalianController::class, 'store']);

    Route::post('/dashboard/pengembalian/ubah/{id}', [PengembalianController::class, 'update']);

    Route::post('/dashboard/pengembalian/hapus/{id}', [PengembalianController::class, 'destroy']);

    // APIs
    Route::get('/api/siswas', [SiswaController::class, 'getSiswas']);;

    Route::get('/api/bukus', [BukuController::class, 'getBukus']);
});
