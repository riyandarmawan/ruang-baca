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

        return view('pages.home', $data);
    }
}
