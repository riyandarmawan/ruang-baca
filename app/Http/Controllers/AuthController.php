<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        $data = [
            'title' => 'Masuk'
        ];

        return view('pages.auth.login', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Daftar'
        ];

        return view('pages.auth.register', $data);
    }
}
