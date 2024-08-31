<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Siswa;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengembalian = new Pengembalian();

        $data = [
            'title' => 'Data Pengembalian',
            'pengembalians' => $pengembalian->all()
        ];

        return view('pages.dashboard.pengembalian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = new Siswa();
        $buku = new Buku();

        $data = [
            'title' => "Tambah Data Pengembalian",
            'siswas' => $siswa->all(),
            'bukus' => $buku->all()
        ];

        return view('pages.dashboard.pengembalian.tambah', $data);
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
    public function show(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengembalian $pengembalian)
    {
        //
    }
}
