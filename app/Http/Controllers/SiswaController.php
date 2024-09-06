<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = new Siswa();

        $data = [
            'title' => 'Data Siswa',
            'siswas' => $siswa->all()
        ];

        return view('pages.dashboard.siswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = new Kelas();

        $data = [
            'title' => "Tambah Data Siswa",
            'kelases' => $kelas->all()
        ];

        return view('pages.dashboard.siswa.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $siswa = new Siswa();

        $request->validate([
            'nisn' => 'required|unique:App\Models\Siswa,nisn|numeric|digits:10',
            'nama' => 'required|max:30',
            'alamat' => 'required',
            'no_telp' => 'required|numeric|min_digits:8|max_digits:13'
        ], [
            // NISN 
            'nisn.required' => 'NISN wajib diisi!',
            'nisn.unique' => 'NISN tersebut sudah ada yang menggunakan, gunakan NISN lain',
            'nisn.numeric' => 'NISN harus berupa angka!',
            'nisn.digits' => 'NISN harus memiliki 10 digit angka',

            // Nama
            'nama.require' => 'Nama wajib diisi!',
            'nama.max' => 'Nama tidak boleh lebih dari 30 karakter!',

            // Alamat
            'alamat.required' => 'Alamat wajib diisi!',

            // No Telepon
            'no_telp.required' => 'No Telepon wajib diisi!',
            'no_telp.numeric' => 'NO Telepon harus berupa angka!',
            'no_telp.min_digits' => 'No Telepon harus lebih dari 8 digit angka',
            'no_telp.max_digits' => 'No Telepon tidak boleh lebih dari 13 digit angka'
        ]);

        $siswa->create($request->all());

        return redirect('/dashboard/siswa')->with('success', 'Data siswa berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function detail($nisn)
    {
        $siswa = new Siswa();
        $kelas = new Kelas();

        $data = [
            'title' => 'Detail siswa',
            'siswa' => $siswa->find($nisn),
            'kelases' => $kelas->all()
        ];

        return view('pages.dashboard.siswa.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nisn)
    {
        $siswa = new Siswa();

        $request->validate([
            'nisn' => [
                'required',
                Rule::unique('siswas', 'nisn')->ignore($nisn ,'nisn'),
                'numeric',
                'digits:10'
            ],
            'nama' => 'required|max:30',
            'alamat' => 'required',
            'no_telp' => 'required|numeric|min_digits:8|max_digits:13'
        ], [
            // NISN 
            'nisn.required' => 'NISN wajib diisi!',
            'nisn.unique' => 'NISN tersebut sudah ada yang menggunakan, gunakan NISN lain',
            'nisn.numeric' => 'NISN harus berupa angka!',
            'nisn.digits' => 'NISN harus memiliki 10 digit angka',

            // Nama
            'nama.require' => 'Nama wajib diisi!',
            'nama.max' => 'Nama tidak boleh lebih dari 30 karakter!',

            // Alamat
            'alamat.required' => 'Alamat wajib diisi!',

            // No Telepon
            'no_telp.required' => 'No Telepon wajib diisi!',
            'no_telp.numeric' => 'NO Telepon harus berupa angka!',
            'no_telp.min_digits' => 'No Telepon harus lebih dari 8 digit angka',
            'no_telp.max_digits' => 'No Telepon tidak boleh lebih dari 13 digit angka'
        ]);

        $siswa->find($nisn)->update($request->all());

        return redirect('/dashboard/siswa')->with('success', 'Data siswa berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nisn)
    {
        $siswa = new Siswa();

        $siswa->find($nisn)->delete();

        return redirect('/dashboard/siswa')->with('success', 'Data siswa berhasil dihapus!');
    }
}
