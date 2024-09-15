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
        DetailPeminjaman::factory(10)->recycle(Buku::all())->recycle(Peminjaman::all())->create();
    }
}
