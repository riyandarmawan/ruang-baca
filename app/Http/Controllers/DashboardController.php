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

        // Aggregate data for books borrowed and returned in the current week
        $dataPinjam = Peminjaman::whereBetween('tanggal_pinjam', [$startOfWeek, $today])
            ->with('bukus') // Eager load bukus
            ->get();

        $dataKembali = Pengembalian::whereBetween('tanggal_kembali', [$startOfWeek, $today])
            ->with('bukus') // Eager load bukus
            ->get();

        // Loop through and calculate the number of books borrowed and returned per day
        foreach ($dataPinjam as $peminjaman) {
            $dayIndex = (Carbon::parse($peminjaman->tanggal_pinjam)->dayOfWeekIso - 1) % 7;
            $pinjamPerHari[$dayIndex] += $peminjaman->bukus->sum('pivot.jumlah');
        }

        foreach ($dataKembali as $pengembalian) {
            $dayIndex = (Carbon::parse($pengembalian->tanggal_kembali)->dayOfWeekIso - 1) % 7;
            $kembaliPerHari[$dayIndex] += $pengembalian->bukus->sum('pivot.jumlah');
        }

        // Calculate total numbers for the week
        $jumlahBukuDiPinjam = array_sum($pinjamPerHari);
        $jumlahBukuDiKembalikan = array_sum($kembaliPerHari);

        // Adjust the calculation for total books still on loan
        // 1. Total books borrowed up until today (even before the current week)
        $totalBukuDipinjamSampaiHariIni = Peminjaman::where('tanggal_pinjam', '<=', $today)
            ->with('bukus')
            ->get()
            ->sum(function ($peminjaman) {
                return $peminjaman->bukus->sum('pivot.jumlah');
            });

        // 2. Total books returned up until today
        $totalBukuDikembalikanSampaiHariIni = Pengembalian::where('tanggal_kembali', '<=', $today)
            ->with('bukus')
            ->get()
            ->sum(function ($pengembalian) {
                return $pengembalian->bukus->sum('pivot.jumlah');
            });

        // Calculate the total number of books that are still borrowed
        $jumlahBukuYangMasihDiPinjam = $totalBukuDipinjamSampaiHariIni - $totalBukuDikembalikanSampaiHariIni;

        // Get the most favorite book and author based on this week's borrow data
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

        // Pass data to the view
        return view('pages.dashboard.index', [
            'title' => 'Dashboard',
            'jumlahBukuDiPinjam' => $jumlahBukuDiPinjam,
            'pinjamPerHari' => $pinjamPerHari,
            'jumlahBukuYangMasihDiPinjam' => max(0, $jumlahBukuYangMasihDiPinjam),
            'jumlahBukuDiKembalikan' => $jumlahBukuDiKembalikan,
            'kembaliPerHari' => $kembaliPerHari,
            'bukuTerfavorit' => $bukuTerfavorit->judul ?? 'Tidak ada data',
            'penulisTerfavorit' => $penulisTerfavorit->penulis ?? 'Tidak ada data',
        ]);
    }
}
