<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Ruang Baca'
        ];

        return view('pages.home.index', $data);
    }

    public function detail($slug) {
        $data = [
            'title' => 'Detail buku'
        ];

        return view('pages.home.detail', $data);
    }
}
