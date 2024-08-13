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