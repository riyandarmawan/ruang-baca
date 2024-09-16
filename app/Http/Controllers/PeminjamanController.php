<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DetailPeminjaman;
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
        $peminjaman = Peminjaman::all();

        $data = [
            'title' => 'Data Peminjaman',
            'peminjamans' => $peminjaman
        ];

        return view('pages.dashboard.peminjaman.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        $buku = Buku::all();

        $data = [
            'title' => "Tambah Data Peminjaman",
            'siswas' => $siswa,
            'bukus' => $buku
        ];

        return view('pages.dashboard.peminjaman.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules
        $rules = [
            'nisn' => 'required|exists:siswas,nisn|numeric|digits:10',
            'books.*.kode_buku' => 'required|exists:bukus,kode_buku|numeric|digits:13',
            'books.*.jumlah' => 'required|numeric|min:1',
        ];

        // Custom error messages
        $messages = [
            'nisn.required' => 'NISN wajib diisi!',
            'nisn.exists' => 'Siswa dengan NISN tersebut tidak ditemukan.',
            'nisn.numeric' => 'NISN harus berupa angka!',
            'nisn.digits' => 'NISN harus 10 digit angka!',
            'books.*.kode_buku.required' => 'Kode buku wajib diisi!',
            'books.*.kode_buku.exists' => 'Buku dengan kode tersebut tidak ditemukan.',
            'books.*.kode_buku.numeric' => 'Kode buku harus berupa angka!',
            'books.*.kode_buku.digits' => 'Kode buku harus 10 digit angka.',
            'books.*.jumlah.required' => 'Jumlah buku wajib diisi!',
            'books.*.jumlah.numeric' => 'Jumlah buku harus berupa angka!',
            'books.*.jumlah.min' => 'Jumlah buku minimal 1.'
        ];

        // Validate request
        $validatedData = $request->validate($rules, $messages);

        // If validation passes, handle the data
        $peminjaman = new Peminjaman();

        $peminjaman->nisn = $request->nisn;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;

        $peminjaman->save();

        $peminjamanId = $peminjaman->id;

        foreach ($request->books as $book) {
            $detailPeminjaman = new DetailPeminjaman();
            $detailPeminjaman->id_peminjaman = $peminjamanId;
            $detailPeminjaman->kode_buku = $book['kode_buku'];
            $detailPeminjaman->jumlah = $book['jumlah'];
            $detailPeminjaman->save();
        }

        return redirect('/dashboard/peminjaman')->with('success', 'Data peminjaman berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $siswa = Siswa::all();
        $buku = Buku::all();

        $data = [
            'title' => "Detail Peminjaman",
            'peminjaman' => $peminjaman,
            'siswas' => $siswa,
            'bukus' => $buku
        ];

        return view('pages.dashboard.peminjaman.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        // Implement edit logic if needed
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        // Implement update logic if needed
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        // Implement delete logic if needed
    }
}
