<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data = [
        'title' => 'Ruang Baca'
    ];

    return view('pages.home', $data);
});

// Auth
Route::get('/auth/login', function () {
    $data = [
        'title' => 'Masuk'
    ];

    return view('pages.auth.login', $data);
});

Route::get('/auth/register', function () {
    $data = [
        'title' => 'Daftar'
    ];

    return view('pages.auth.register', $data);
});

// dashboard
Route::get('/dashboard', function () {
    $data = [
        'title' => 'Dashboard'
    ];

    return view('pages.dashboard.index', $data);
});

Route::get('/dashboard/data-siswa', [SiswaController::class, 'index']);

Route::get('/dashboard/data-buku', [BukuController::class, 'index']);

Route::get('/dashboard/peminjaman', function () {
    $data = [
        'title' => 'Data Peminjaman'
    ];

    return view('pages.dashboard.peminjaman', $data);
});

Route::get('/dashboard/pengembalian', function () {
    $data = [
        'title' => 'Data Pengembalian'
    ];

    return view('pages.dashboard.pengembalian', $data);
});