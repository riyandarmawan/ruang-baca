<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DetailPengembalian;
use App\Models\Siswa;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $pengembalian = new Pengembalian();

        if ($search) {
            $pengembalians = $pengembalian
                ->where('nisn', 'like', "%$search%")
                ->orWhereHas('siswa', function ($query) use ($search) {
                    $query->where('nama', 'like', "%$search%");
                })
                ->orWhere('tanggal_kembali', 'like', "%$search%")
                ->paginate(10)
                ->appends(['search' => $search]);
        } else {
            $pengembalians = $pengembalian->paginate(10);
        }

        $data = [
            'title' => 'Data Pengembalian',
            'pengembalians' => $pengembalians,
            'search' => $search
        ];

        return view('pages.dashboard.pengembalian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => "Tambah Data Pengembalian",
        ];

        return view('pages.dashboard.pengembalian.tambah', $data);
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
        $pengembalian = new Pengembalian();

        $pengembalian->nisn = $request->nisn;
        $pengembalian->tanggal_kembali = $request->tanggal_kembali;

        $pengembalian->save();

        $idPengembalian = $pengembalian->id;

        foreach ($request->kode_buku as $index => $kode_buku) {
            $detailPengembalian = new DetailPengembalian();

            $detailPengembalian->id_Pengembalian = $idPengembalian;
            $detailPengembalian->kode_buku = $kode_buku;
            $detailPengembalian->jumlah = $request->jumlah[$index];

            $detailPengembalian->save();
        }

        return redirect('/dashboard/pengembalian')->with('success', 'Data pengembalian berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        $pengembalian = Pengembalian::find($id);

        $data = [
            'title' => "Detail pengembalian",
            'pengembalian' => $pengembalian,
        ];

        return view('pages.dashboard.pengembalian.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengembalian $pengembalian)
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
        $pengembalian = Pengembalian::find($id);

        $pengembalian->nisn = $request->nisn;
        $pengembalian->tanggal_kembali = $request->tanggal_kembali;

        $pengembalian->save();

        $idPengembalian = $pengembalian->id;

        foreach ($request->kode_buku as $index => $kode_buku) {
            // Check if a DetailPengembalian exists for the given index
            $detailPengembalian = DetailPengembalian::where('id_pengembalian', $id)
                ->skip($index)
                ->first();

            // If the record exists, update it
            if ($detailPengembalian) {
                $detailPengembalian->kode_buku = $kode_buku;
                $detailPengembalian->jumlah = $request->jumlah[$index];
            }
            // If no record exists for this index, create a new one
            else {
                $detailPengembalian = new Detailpengembalian();
                $detailPengembalian->id_pengembalian = $idPengembalian; // Set the foreign key
                $detailPengembalian->kode_buku = $kode_buku;
                $detailPengembalian->jumlah = $request->jumlah[$index];
            }

            // Save the record (whether it's new or updated)
            $detailPengembalian->save();
        }

        return redirect('/dashboard/pengembalian')->with('success', 'Data pengembalian berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengembalian = Pengembalian::find($id);
        $detailPengembalians = DetailPengembalian::where('id_pengembalian', $pengembalian->id)->get();

        foreach ($detailPengembalians as $detailPengembalian) {
            $detailPengembalian->delete();
        }

        $pengembalian->delete();

        return redirect('/dashboard/pengembalian')->with('success', 'Data pengembalian berhasil dihapus!');
    }
}
