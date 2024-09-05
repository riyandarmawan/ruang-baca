<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

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
            'nisn' => 'required|unique:App\Models\Siswa,nisn|digits:10|numeric',
            'nama' => 'required|max:30',
            'alamat' => 'required',
            'no_telp' => 'required|max_digits:13|numeric'
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
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
