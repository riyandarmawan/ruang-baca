<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $buku = new Buku();
        $kategori = new Kategori();

        $data = [
            'title' => 'Ruang Baca',
            'bukus' => $buku->all(),
            'kategoris' => $kategori->all()
        ];

        return view('pages.home.index', $data);
    }

    public function detail($slug) {
        $buku = new Buku();

        $data = [
            'title' => 'Detail buku',
            'buku' => $buku->where('slug', $slug)->first()
        ];

        return view('pages.home.detail', $data);
    }
}
