<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dataPinjam = Peminjaman::whereBetween('tanggal_pinjam', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])
            ->with('bukus')
            ->get();

        $dataKembali = Pengembalian::whereBetween('tanggal_kembali', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])
            ->with('bukus')
            ->get();

        $jumlahBukuDiPinjam = $dataPinjam->sum(function ($peminjaman) {
            return $peminjaman->bukus->sum('pivot.jumlah');
        });

        $jumlahBukuDiKembalikan = $dataKembali->sum(function ($pengembalian) {
            return $pengembalian->bukus->sum('pivot.jumlah');
        });

        $pinjamPerHari = array_fill(0, 7, 0);
        $kembaliPerHari = array_fill(0, 7, 0);
        
        // Aggregate data for each day, ensuring Monday is index 0 and Sunday is index 6
        foreach ($dataPinjam as $peminjaman) {
            $dayIndex = (Carbon::parse($peminjaman->tanggal_pinjam)->dayOfWeekIso - 1 + 7) % 7;
            $pinjamPerHari[$dayIndex] += $peminjaman->bukus->sum('pivot.jumlah');
        }

        foreach ($dataKembali as $pengembalian) {
            $dayIndex = (Carbon::parse($pengembalian->tanggal_kembali)->dayOfWeekIso - 1 + 7) % 7;
            $kembaliPerHari[$dayIndex] += $pengembalian->bukus->sum('pivot.jumlah');
        }

        $data = [
            'title' => 'Dashboard',
            'jumlahBukuDiPinjam' => $jumlahBukuDiPinjam,
            'pinjamPerHari' => $pinjamPerHari,
            'jumlahBukuDiKembalikan' => $jumlahBukuDiKembalikan,
            'kembaliPerHari' => $kembaliPerHari,
        ];

        return view('pages.dashboard.index', $data);
    }
}
