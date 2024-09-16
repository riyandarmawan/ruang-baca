<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Siswa;
use Illuminate\Http\Request;

class ApiControler extends Controller
{
    public function siswa($nisn) {
        $siswa = Siswa::find($nisn);

        if($siswa) {
            return response()->json($siswa);
        }

        return response()->json([
            'pesan' => 'Siswa yang anda cari tidak ditemukan!'
        ], 404);
    }

    public function buku($kode_buku) {
        $buku = Buku::find($kode_buku);

        if($buku) {
            return response()->json($buku);
        }

        return response()->json([
            'pesan' => 'Buku yang anda cari tidak ditemukan!'
        ], 404);
    }
}
