<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\DetailPengembalian;
use App\Models\Kelas;
use App\Models\Pengembalian;
use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailPengembalianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas = new Kelas();

        $buku = Buku::factory(10)->create();
        $siswa = Siswa::factory(10)->recycle($kelas->all())->create();
        $pengembalian = Pengembalian::factory(10)->recycle($siswa)->create();

        DetailPengembalian::factory(10)->recycle($buku)->recycle($pengembalian)->create();
    }
}
