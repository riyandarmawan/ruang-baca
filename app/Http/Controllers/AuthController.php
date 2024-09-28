<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'username' => 'required',
            'password' => 'required|min:8'
        ], [
            // Username
            'username.required' => 'Username wajib diisi!',

            // Password
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal harus 8 karakter',
        ]);

        // Check if the username exists in the database (including soft-deleted users)
        $user = User::withTrashed()->where('username', $credentials['username'])->first();

        if (!$user) {
            // If no user is found, return an error message
            return redirect()->back()->withErrors(['username' => 'Username tersebut tidak terdaftar!']);
        }

        // Check if the user is soft deleted
        if ($user->trashed()) {
            return redirect()->back()->withErrors(['username' => 'Akun ini telah dihapus!']);
        }

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if($request->password === config('app.default_password', 'password')) {
                return redirect('/auth/consider-to-change-your-password');
            }

            return redirect()->intended('/dashboard');
        }

        // If authentication fails, return an error message for the password
        return redirect()->back()->withErrors(['password' => 'Password yang anda masukkan salah!'])->onlyInput('username');
    }

    public function considerToChangePassword() {
        $data = [
            'title' => 'Pertimbangkan untuk mengganti password anda!'
        ];

        return view('pages.auth.consider-to-change-password', $data);
    }

    public function logout(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/auth/login');
    }
}
