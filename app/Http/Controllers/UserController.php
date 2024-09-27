<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $data = [
            'title' => 'Profile ' . Auth::user()->name,
        ];

        return view('pages.dashboard.user.profile', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $username)
    {
        $user = User::where('username', $username)->first();

        $validator = Validator::make(
            $request->all(),
            [
                'profile' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
                'name' => 'required',
                'username' => [
                    'required',
                    'min:5',
                    'max:255',
                    Rule::unique('users', 'username')->ignore($user->username, 'username'),
                ],
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')->ignore($user->email, 'email'),
                ],
            ],
            [
                // photo profile
                'profile.image' => 'Photo profile harus berupa gambar!',
                'profile.mimes' => 'Photo profile harus berupa jpeg, jpg, atau png!',
                'profile.max' => 'Photo profile harus berukuranw kurang dari 2mb!',

                // name
                'name.required' => 'Nama lenkap wajib diisi!',

                // username
                'username.required' => 'Username wajib diisi!',
                'username.unique' => 'Username sudah terdaftar!',
                'username.min' => 'Username minimal harus 5 karakter!',
                'username.max' => 'Username maksimal 255 karakter!',

                // email
                'email.required' => 'Email wajib diisi!',
                'email.email' => 'Format email tidak valid!',
                'email.unique' => 'Email sudah terdaftar!',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->withFragment('ubah');
        }

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->file('profile')) {
            if ($user->profile && $user->profile !== 'user.png' && Storage::exists("public/images/users/$user->profile")) {
                Storage::delete("public/images/users/$user->profile");
            }

            $profile = $request->file('profile');
            $profileName = time() . '.' . $profile->getClientOriginalExtension();
            $profile->storeAs('public/images/users', $profileName);

            $user->profile = $profileName;
        }

        $user->save();

        return redirect('/auth/login')->with('success', 'Informasi akun anda terlah diubah!');
    }

    public function changePassword(Request $request, $username)
    {
        // Validate the request input
        $validator = Validator::make(
            $request->all(),
            [
                'oldPassword' => 'required|string',
                'password' => 'required|string|min:8|confirmed',
            ],
            [
                'oldPassword.required' => 'Password lama wajib diisi.',
                'password.required' => 'Password baru wajib diisi.',
                'password.min' => 'Password baru harus memiliki minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
            ]
        );

        // Redirect back with validation errors if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withFragment('ubah-password'); // Optional fragment
        }

        // Retrieve the user by username
        $user = User::where('username', $username)->first();

        // Check if the old password is correct
        if (!Hash::check($request->oldPassword, $user->password)) {
            return redirect()->back()
                ->withErrors(['oldPassword' => 'Password lama tidak sesuai.'])
                ->withFragment('ubah-password');
        }

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->save();

        // Log out the user and invalidate session
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the login page with a success message
        return redirect('/auth/login')->with('success', 'Password anda berhasil diubah. Silakan login dengan password baru Anda.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $username)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $user = User::where('username', $username)->first();

        $user->delete();

        return redirect('/auth/login')->with('success', 'Akun anda berhasil dihapus!');
    }
}
