<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = new Kelas();

        $data = [
            'title' => 'Data Kelas',
            'kelases' => $kelas->all()
        ];

        return view('pages.dashboard.kelas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => "Tambah Data Kelas"
        ];

        return view('pages.dashboard.kelas.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kelas = new Kelas();

        $request->validate([
            'kode_kelas' => [
                'required',
                'unique:App\Models\Kelas,kode_kelas',
                'regex:/^(X|XI|XII)-[A-Z]+$/'
            ],
            'jurusan' => 'required'
        ], [
            // Kode Kelas
            'kode_kelas.required' => 'Kode Kelas harus diisi!',
            'kode_kelas.regex' => 'Kode Kelas harus mengikuti format TINGKAT-JURUSAN (Contoh: X-AK)',

            // Jurusan
            'jurusan.required' => 'Jurusan harus diisi!'
        ]);

        $kelas->create($request->all());

        return redirect('/dashboard/kelas')->with('success', 'Data kelas berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function detail($kode_kelas)
    {
        $kelas = new Kelas();

        $data = [
            'title' => "Detail Kelas",
            'kelas' => $kelas->find($kode_kelas)
        ];

        return view('pages.dashboard.kelas.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kode_kelas)
    {
        $kelas = new Kelas();

        $request->validate([
            'kode_kelas' => [
                'required',
                Rule::unique('kelases', 'kode_kelas')->ignore($kode_kelas, 'kode_kelas'),
                'regex:/^(X|XI|XII)-[A-Z]+$/'
            ],
            'jurusan' => 'required'
        ], [
            // Kode Kelas
            'kode_kelas.required' => 'Kode Kelas harus diisi!',
            'kode_kelas.unique' => 'Kode Kelas sudah digunakan sebelumnya! Cari alternatif lain!',
            'kode_kelas.regex' => 'Kode Kelas harus mengikuti format TINGKAT-JURUSAN (Contoh: X-AK)',

            // Jurusan
            'jurusan.required' => 'Jurusan harus diisi!'
        ]);

        $kelas->find($kode_kelas)->update($request->all());

        return redirect('/dashboard/kelas')->with('success', 'Data kelas berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kode_kelas)
    {
        $kelas = new Kelas();

        $kelas->find($kode_kelas)->delete();

        return redirect('/dashboard/kelas')->with('success', 'Data kelas berhasil dihapus!');//
    }
}
