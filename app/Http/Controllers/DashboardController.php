<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $startOfWeek = Carbon::now()->startOfWeek()->format('Y-m-d');
        $today = Carbon::now()->format('Y-m-d');

        // Initialize arrays with 7 days (Monday to Sunday)
        $pinjamPerHari = array_fill(0, 7, 0);
        $kembaliPerHari = array_fill(0, 7, 0);

        // Aggregate data for books borrowed and returned
        $dataPinjam = Peminjaman::whereBetween('tanggal_pinjam', [$startOfWeek, $today])
            ->with('bukus') // Eager load bukus
            ->get();

        $dataKembali = Pengembalian::whereBetween('tanggal_kembali', [$startOfWeek, $today])
            ->with('bukus') // Eager load bukus
            ->get();

        foreach ($dataPinjam as $peminjaman) {
            $dayIndex = (Carbon::parse($peminjaman->tanggal_pinjam)->dayOfWeekIso - 1) % 7;
            $pinjamPerHari[$dayIndex] += $peminjaman->bukus->sum('pivot.jumlah');
        }

        foreach ($dataKembali as $pengembalian) {
            $dayIndex = (Carbon::parse($pengembalian->tanggal_kembali)->dayOfWeekIso - 1) % 7;
            $kembaliPerHari[$dayIndex] += $pengembalian->bukus->sum('pivot.jumlah');
        }

        // Calculate total numbers
        $jumlahBukuDiPinjam = array_sum($pinjamPerHari);
        $jumlahBukuDiKembalikan = array_sum($kembaliPerHari);
        $jumlahBukuYangMasihDiPinjam = $jumlahBukuDiPinjam - $jumlahBukuDiKembalikan;

        // Get most favorite book, author, and publisher based on this week
        $bukuTerfavorit = Buku::select('bukus.judul')
            ->join('detail_peminjaman', 'bukus.kode_buku', '=', 'detail_peminjaman.kode_buku')
            ->join('peminjamans', 'detail_peminjaman.id_peminjaman', '=', 'peminjamans.id')
            ->whereBetween('peminjamans.tanggal_pinjam', [$startOfWeek, $today])
            ->groupBy('bukus.judul')
            ->orderByRaw('SUM(detail_peminjaman.jumlah) DESC')
            ->first();

        $penulisTerfavorit = Buku::select('bukus.penulis')
            ->join('detail_peminjaman', 'bukus.kode_buku', '=', 'detail_peminjaman.kode_buku')
            ->join('peminjamans', 'detail_peminjaman.id_peminjaman', '=', 'peminjamans.id')
            ->whereBetween('peminjamans.tanggal_pinjam', [$startOfWeek, $today])
            ->groupBy('bukus.penulis')
            ->orderByRaw('SUM(detail_peminjaman.jumlah) DESC')
            ->first();

        // $penerbitTerfavorit = Buku::select('bukus.penerbit')
        //     ->join('detail_peminjaman', 'bukus.kode_buku', '=', 'detail_peminjaman.kode_buku')
        //     ->join('peminjamans', 'detail_peminjaman.id_peminjaman', '=', 'peminjamans.id')
        //     ->whereBetween('peminjamans.tanggal_pinjam', [$startOfWeek, $today])
        //     ->groupBy('bukus.penerbit')
        //     ->orderByRaw('SUM(detail_peminjaman.jumlah) DESC')
        //     ->first();

        // Pass data to the view
        return view('pages.dashboard.index', [
            'title' => 'Dashboard',
            'jumlahBukuDiPinjam' => $jumlahBukuDiPinjam,
            'pinjamPerHari' => $pinjamPerHari,
            'jumlahBukuYangMasihDiPinjam' => $jumlahBukuYangMasihDiPinjam,
            'jumlahBukuDiKembalikan' => $jumlahBukuDiKembalikan,
            'kembaliPerHari' => $kembaliPerHari,
            'bukuTerfavorit' => $bukuTerfavorit->judul ?? 'Tidak ada data',
            'penulisTerfavorit' => $penulisTerfavorit->penulis ?? 'Tidak ada data',
            // 'penerbitTerfavorit' => $penerbitTerfavorit->penerbit ?? 'Tidak ada data'
        ]);
    }
}
