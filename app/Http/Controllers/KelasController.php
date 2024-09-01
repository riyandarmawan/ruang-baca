<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function detail($kode_kelas)
    {
        $kelas = new Kelas();

        $data = [
            'title' => "Detail Kelas",
            'kelas' => $kelas->find($kode_kelas)->first()
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
    public function update(Request $request, Kelas $kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        //
    }
}
