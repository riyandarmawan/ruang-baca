<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data = [
        'title' => 'Ruang Baca'
    ];

    return view('pages.home', $data);
});

// dashboard
Route::get('/dashboard', function () {
    $data = [
        'title' => 'Dashboard'
    ];

    return view('pages.dashboard.index', $data);
});

Route::get('/dashboard/data-siswa', function () {
    $data = [
        'title' => 'Data Siswa'
    ];

    return view('pages.dashboard.data-siswa', $data);
});

Route::get('/dashboard/data-buku', function () {
    $data = [
        'title' => 'Data Buku'
    ];

    return view('pages.dashboard.data-buku', $data);
});

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