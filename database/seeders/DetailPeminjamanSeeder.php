<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Database\Seeder;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailPeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas = new Kelas();

        $buku = Buku::factory(10)->create();
        $siswa = Siswa::factory(10)->recycle($kelas->all())->create();
        $peminjaman = Peminjaman::factory(10)->recycle($siswa)->create();

        DetailPeminjaman::factory(10)->recycle($buku)->recycle($peminjaman)->create();
    }
}
