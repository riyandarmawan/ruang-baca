<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        $data = [
            'title' => 'Masuk'
        ];

        return view('pages.auth.login', $data);
    }

    public function attemptLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required|min:8'
        ], [
            // Username
            'username.required' => 'Username wajib diisi!',
            'username.exists' => 'Username tersebut tidak terdaftar!',

            // Password
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal harus 8 karakter'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return redirect()->back()->withErrors(['password' => 'Password yang anda masukkan salah!'])->onlyInput('username');
    }

    public function register()
    {
        $data = [
            'title' => 'Daftar'
        ];

        return view('pages.auth.register', $data);
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
