<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

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
            'kategoris' => $kategori->all()
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
        //
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
    public function update(Request $request, Kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
