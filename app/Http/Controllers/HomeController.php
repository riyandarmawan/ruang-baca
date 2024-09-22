<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $kategori = new Kategori();

        $query = $kategori->query();

        if ($search) {
            $query->where('nama', 'like', "%$search%")
                ->orWhereHas('bukus', function ($query) use ($search) {
                    $query->where('judul', 'like', "%$search%")
                        ->orWhere('penulis', 'like', "%$search%");;
                });
        }

        $kategoris = $query->with('bukus')->get();

        $data = [
            'title' => 'Ruang Baca',
            'allKategoris' => $kategori->all(),
            'kategoris' => $kategoris,
            'search' => $search,
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
