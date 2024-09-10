<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kategori = new Kategori();

        $data = [
            'title' => 'Data Kategori',
            'kategoris' => $kategori->paginate(10)
        ];

        return view('pages.dashboard.kategori.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => "Tambah Data Kategori"
        ];

        return view('pages.dashboard.kategori.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ], [
            'nama.required' => 'Nama wajib diisi!'
        ]);

        $kategori = new Kategori();

        $kategori->nama = $request->nama;

        $kategori->slug = Str::slug($request->nama);

        $kategori->save();

        return redirect('/dashboard/kategori')->with('success', 'Data kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function detail($slug)
    {
        $kategori = new Kategori();

        $data = [
            'title' => "Detail Kategori",
            'kategori' => $kategori->where('slug', $slug)->first()
        ];

        return view('pages.dashboard.kategori.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required'
        ], [
            'nama.required' => 'Nama wajib diisi!'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->withFragment('ubah');
        }

        $kategori = Kategori::where('slug', $slug)->firstOrFail();

        $kategori->nama = $request->nama;

        $kategori->slug = Str::slug($request->nama);

        $kategori->save();

        return redirect('/dashboard/kategori')->with('success', 'Data kategori berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $kategori = new Kategori();

        $kategori->where('slug', $slug)->firstOrFail()->delete();

        return redirect('/dashboard/kategori')->with('success', 'Data kategroi berhasil dihapus!');
    }
}
