<?php

namespace Database\Seeders;

use App\Models\Pengembalian;
use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengembalianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengembalian::factory(10)->recycle(Siswa::all())->create();
    }
}
