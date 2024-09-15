<?php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\Peminjaman;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Peminjaman::factory(10)->recycle(Siswa::all())->create();
    }
}
