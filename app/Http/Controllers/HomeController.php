<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $judul = $request->input('judul');
        $penulis = $request->input('penulis');
        $kategoriId = $request->input('kategori_id');

        $kategori = new Kategori();

        $query = $kategori->query();

        if ($request->filled('judul')) {
            $query->whereHas('bukus', function ($query) use ($judul) {
                $query->where('judul', 'like', "%$judul%");
            });
        }

        if ($request->filled('penulis')) {
            $query->whereHas('bukus', function ($query) use ($penulis) {
                $query->where('penulis', 'like', "%$penulis%");
            });
        }

        if ($request->filled('kategori_id') && $kategoriId != 'all') {
            $query->where('id', '=', "$kategoriId");
        }

        $kategoris = $query->with('bukus')->get();

        $data = [
            'title' => 'Ruang Baca',
            'allKategoris' => $kategori->all(),
            'kategoris' => $kategoris,
            'judul' => $judul,
            'penulis' => $penulis,
            'kategoriId' => $kategoriId
        ];

        return view('pages.home.index', $data);
    }

    public function detail($slug)
    {
        $buku = new Buku();
        $kategori = new Kategori();

        $data = [
            'title' => 'Detail buku',
            'buku' => $buku->where('slug', $slug)->first(),
            'allKategoris' => $kategori->all()
        ];

        return view('pages.home.detail', $data);
    }
}
