<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

// dashboard
Route::get('/dashboard/laporan', function () {
    return view('pages.dashboard.laporan');
});