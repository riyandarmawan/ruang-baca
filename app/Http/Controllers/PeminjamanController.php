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
    public function index(Request $request)
    {
        $search = $request->input('search');

        $peminjaman = new Peminjaman();

        if($search) {
            $peminjamans = $peminjaman
                ->where('nisn', 'like', "%$search%")
                ->orWhereHas('siswa', function ($query) use ($search) {
                    $query->where('nama','like', "%$search%");
                })
                ->orWhere('tanggal_pinjam', 'like', "%$search%")
                ->orWhere('tanggal_kembali', 'like', "%$search%")
                ->paginate(10)
                ->appends(['search' => $search]);
        } else {
           $peminjamans = $peminjaman->paginate(10);
        }

        $data = [
            'title' => 'Data Peminjaman',
            'peminjamans' => $peminjamans,
            'search' => $search
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
            'kode_buku.*' => 'required|exists:bukus,kode_buku|numeric|digits:13',
            'jumlah.*' => 'required|numeric|min:1',
        ];

        // Custom error messages
        $messages = [
            'nisn.required' => 'NISN wajib diisi!',
            'nisn.exists' => 'Siswa dengan NISN tersebut tidak ditemukan.',
            'nisn.numeric' => 'NISN harus berupa angka!',
            'nisn.digits' => 'NISN harus 10 digit angka!',

            'kode_buku.*.required' => 'Kode buku wajib diisi!',
            'kode_buku.*.exists' => 'Buku dengan kode tersebut tidak ditemukan.',
            'kode_buku.*.numeric' => 'Kode buku harus berupa angka!',
            'kode_buku.*.digits' => 'Kode buku harus 10 digit angka.',

            'jumlah.*.required' => 'Jumlah buku wajib diisi!',
            'jumlah.*.numeric' => 'Jumlah buku harus berupa angka!',
            'jumlah.*.min' => 'Jumlah buku minimal 1.'
        ];

        // Validate request
        $validatedData = $request->validate($rules, $messages);

        // If validation passes, handle the data
        $peminjaman = new Peminjaman();

        $peminjaman->nisn = $request->nisn;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;

        $peminjaman->save();

        $idPeminjaman = $peminjaman->id;

        foreach ($request->kode_buku as $index => $kode_buku) {
            $detailPeminjaman = new DetailPeminjaman();

            $detailPeminjaman->id_peminjaman = $idPeminjaman;
            $detailPeminjaman->kode_buku = $kode_buku;
            $detailPeminjaman->jumlah = $request->jumlah[$index];

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
    public function update(Request $request, $id)
    { // Validation rules
        $rules = [
            'nisn' => 'required|exists:siswas,nisn|numeric|digits:10',
            'kode_buku.*' => 'required|exists:bukus,kode_buku|numeric|digits:13',
            'jumlah.*' => 'required|numeric|min:1',
        ];

        // Custom error messages
        $messages = [
            'nisn.required' => 'NISN wajib diisi!',
            'nisn.exists' => 'Siswa dengan NISN tersebut tidak ditemukan.',
            'nisn.numeric' => 'NISN harus berupa angka!',
            'nisn.digits' => 'NISN harus 10 digit angka!',

            'kode_buku.*.required' => 'Kode buku wajib diisi!',
            'kode_buku.*.exists' => 'Buku dengan kode tersebut tidak ditemukan.',
            'kode_buku.*.numeric' => 'Kode buku harus berupa angka!',
            'kode_buku.*.digits' => 'Kode buku harus 10 digit angka.',

            'jumlah.*.required' => 'Jumlah buku wajib diisi!',
            'jumlah.*.numeric' => 'Jumlah buku harus berupa angka!',
            'jumlah.*.min' => 'Jumlah buku minimal 1.'
        ];

        // Validate request
        $validatedData = $request->validate($rules, $messages);

        // If validation passes, handle the data
        $peminjaman = Peminjaman::find($id);

        $peminjaman->nisn = $request->nisn;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;

        $peminjaman->save();

        $idPeminjaman = $peminjaman->id;

        foreach ($request->kode_buku as $index => $kode_buku) {
            // Check if a DetailPeminjaman exists for the given index
            $detailPeminjaman = DetailPeminjaman::where('id_peminjaman', $id)
                ->skip($index)
                ->first();

            // If the record exists, update it
            if ($detailPeminjaman) {
                $detailPeminjaman->kode_buku = $kode_buku;
                $detailPeminjaman->jumlah = $request->jumlah[$index];
            }
            // If no record exists for this index, create a new one
            else {
                $detailPeminjaman = new DetailPeminjaman();
                $detailPeminjaman->id_peminjaman = $idPeminjaman; // Set the foreign key
                $detailPeminjaman->kode_buku = $kode_buku;
                $detailPeminjaman->jumlah = $request->jumlah[$index];
            }

            // Save the record (whether it's new or updated)
            $detailPeminjaman->save();
        }

        return redirect('/dashboard/peminjaman')->with('success', 'Data peminjaman berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::find($id);
        $detailPeminjamans = DetailPeminjaman::where('id_peminjaman', $peminjaman->id)->get();

        foreach($detailPeminjamans as $detailPeminjaman) {
            $detailPeminjaman->delete();
        }

        $peminjaman->delete();

        return redirect('/dashboard/peminjaman')->with('success', 'Data peminjaman berhasil dihapus!');
    }
}
