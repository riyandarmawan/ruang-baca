<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $buku = new Buku();

        $data = [
            'title' => 'Data Buku',
            'bukus' => $buku->with(['kategori'])->get()
        ];

        return view('pages.dashboard.buku.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = new Kategori();

        $data = [
            'title' => "Tambah Data Buku",
            'kategoris' => $kategori->all()
        ];

        return view('pages.dashboard.buku.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->file('sampul'));

        $request->validate([
            'kode_buku' => 'required|unique:App\Models\Buku,kode_buku|digits:13',
            'sampul' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'judul' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric|digits:4',
            'jumlah_halaman' => 'required|numeric',
            'deskripsi' => 'required'
        ], [
            // Kode Buku
            'kode_buku.required' => 'Kode buku harus diisi!',
            'kode_buku.unique' => 'Kode buku ini sudah digunakan!',
            'kode_buku.digits' => 'Kode buku harus terdiri dari 13 digit angka!',

            // Sampul
            'sampul.required' => 'Sampul harus diisi!',
            'sampul.image' => 'Sampul harus berupa gambar!',
            'sampul.mimes' => 'Sampul harus berupa jpeg, jpg, atau png!',
            'sampul.max' => 'Sampul harus berukuranw kurang dari 2mb!',

            // Judul
            'judul.required' => 'Judul buku harus diisi!',

            // Penerbit
            'penerbit.required' => 'Penerbit buku harus diisi!',

            // Tahun Terbit
            'tahun_terbit.required' => 'Tahun terbit harus diisi!',
            'tahun_terbit.numeric' => 'Tahun terbit harus berupa angka!',
            'tahun_terbit.digits' => 'Tahun terbit harus berupa 4 digit angka!',

            // Jumlah Halaman
            'jumlah_halaman.required' => 'Jumlah halaman harus diisi!',
            'jumlah_halaman.numeric' => 'Jumlah halaman harus berupa angka!',

            // Deskripsi
            'deskripsi.required' => 'Deskripsi buku harus diisi!'
        ]);

        $buku = new Buku();

        $buku->kode_buku = $request->kode_buku;
        $buku->judul = $request->judul;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->jumlah_halaman = $request->jumlah_halaman;
        $buku->kategori_id = $request->kategori_id;
        $buku->deskripsi = $request->deskripsi;

        $buku->slug = Str::slug($request->judul);

        if ($request->file('sampul')) {
            $sampul = $request->file('sampul');
            $sampulName = time() . '.' . $sampul->getClientOriginalExtension();
            $sampul->storeAs('public/images/bukus', $sampulName);

            $buku->sampul = $sampulName;
        }

        $buku->save();

        return redirect('/dashboard/buku')->with('success', 'Data buku berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function detail($slug)
    {
        $buku = new Buku();
        $kategori = new Kategori();

        $data = [
            'title' => "Detail Buku",
            'buku' => $buku->where('slug', $slug)->firstOrFail(),
            'kategoris' => $kategori->all()
        ];

        return view('pages.dashboard.buku.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $buku =  Buku::where('slug', $slug)->firstOrFail();

        $validator = Validator::make($request->all(), [
            'kode_buku' => [
                'required',
                Rule::unique('bukus', 'kode_buku')->ignore($buku->kode_buku, 'kode_buku'),
                'digits:13'
            ],
            'sampul' => 'image|mimes:jpeg,jpg,png|max:2048',
            'judul' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric|digits:4',
            'jumlah_halaman' => 'required|numeric',
            'deskripsi' => 'required'
        ], [
            // Kode Buku
            'kode_buku.required' => 'Kode buku harus diisi!',
            'kode_buku.unique' => 'Kode buku ini sudah digunakan!',
            'kode_buku.digits' => 'Kode buku harus terdiri dari 13 digit angka!',

            // Sampul
            'sampul.image' => 'Sampul harus berupa gambar!',
            'sampul.mimes' => 'Sampul harus berupa jpeg, jpg, atau png!',
            'sampul.max' => 'Sampul harus berukuranw kurang dari 2mb!',

            // Judul
            'judul.required' => 'Judul buku harus diisi!',

            // Penerbit
            'penerbit.required' => 'Penerbit buku harus diisi!',

            // Tahun Terbit
            'tahun_terbit.required' => 'Tahun terbit harus diisi!',
            'tahun_terbit.numeric' => 'Tahun terbit harus berupa angka!',
            'tahun_terbit.digits' => 'Tahun terbit harus berupa 4 digit angka!',

            // Jumlah Halaman
            'jumlah_halaman.required' => 'Jumlah halaman harus diisi!',
            'jumlah_halaman.numeric' => 'Jumlah halaman harus berupa angka!',

            // Deskripsi
            'deskripsi.required' => 'Deskripsi buku harus diisi!'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->withFragment('ubah');
        }

        $buku->kode_buku = $request->kode_buku;
        $buku->judul = $request->judul;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->jumlah_halaman = $request->jumlah_halaman;
        $buku->kategori_id = $request->kategori_id;
        $buku->deskripsi = $request->deskripsi;

        $buku->slug = Str::slug($request->judul);

        $buku->sampul = $buku->sampul;

        if ($request->file('sampul')) {
            if ($buku->sampul && $buku->sampul !== 'no-cover.jpg' && Storage::exists("public/images/bukus/$buku->sampul")) {
                Storage::delete("public/images/bukus/$buku->sampul");
            }

            $sampul = $request->file('sampul');
            $sampulName = time() . '.' . $sampul->getClientOriginalExtension();
            $sampul->storeAs('public/images/bukus', $sampulName);

            $buku->sampul = $sampulName;
        }

        $buku->save();

        return redirect('/dashboard/buku')->with('success', 'Data buku berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $buku = Buku::where('slug', $slug)->firstOrFail();

        if ($buku->sampul && $buku->sampul !== 'no-cover.jpg' && Storage::exists("public/images/bukus/$buku->sampul")) {
            Storage::delete("public/images/bukus/$buku->sampul");
        }

        $buku->delete();

        return redirect('/dashboard/buku')->with('success', 'Data buku berhasil dihapus!');
    }
}
