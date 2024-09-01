<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Siswa;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = new Peminjaman();

        $data = [
            'title' => 'Data Peminjaman',
            'peminjamans' => $peminjaman->all()
        ];

        return view('pages.dashboard.peminjaman.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = new Siswa();
        $buku = new Buku();

        $data = [
            'title' => "Tambah Data Peminjaman",
            'siswas' => $siswa->all(),
            'bukus' => $buku->all()
        ];

        return view('pages.dashboard.peminjaman.tambah', $data);
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
    public function detail($id)
    {
        $peminjaman = new Peminjaman();
        $siswa = new Siswa();
        $buku = new Buku();

        $data = [
            'title' => "Detail Peminjaman",
            'peminjaman' => $peminjaman->where('id', $id)->first(),
            'siswas' => $siswa->all(),
            'bukus' => $buku->all()
        ];

        return view('pages.dashboard.peminjaman.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
