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

    public function attemptRegister(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'profile' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required',
            'username' => 'required|unique:users,username|min:5|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:8|confirmed', // "confirmed" checks for matching password_confirmation field
        ], [
            // Custom error messages
            'profile.image' => 'Photo profile harus berupa gambar!',
            'profile.mimes' => 'Photo profile harus berupa jpeg, jpg, atau png!',
            'profile.max' => 'Photo profile harus berukuranw kurang dari 2mb!',
            'name.required' => 'Nama lenkap wajib diisi!',
            'username.required' => 'Username wajib diisi!',
            'username.unique' => 'Username sudah terdaftar!',
            'username.min' => 'Username minimal harus 5 karakter!',
            'username.max' => 'Username maksimal 255 karakter!',
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email tidak valid!',
            'email.unique' => 'Email sudah terdaftar!',
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal harus 8 karakter!',
            'password.confirmed' => 'Password konfirmasi tidak cocok!',
        ]);

        $user = new User();

        $user->profile = 'user.png';

        if ($request->file('profile')) {
            $profile = $request->file('profile');
            $profileName = time() . '.' . $profile->getClientOriginalExtension();
            $profile->storeAs('public/images/users', $profileName);

            $user->profile = $profileName;
        }

        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = 'admin';
        
        $user->save();

        // Automatically log the user in after registration
        Auth::login($user);

        // Regenerate session for security purposes
        $request->session()->regenerate();

        // Redirect the user to the dashboard
        return redirect()->intended('/dashboard');
    }

    public function logout(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/auth/login');
    }
}
