<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\DetailPengembalian;
use App\Models\Pengembalian;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailPengembalianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailPengembalian::factory(10)->recycle(Buku::all())->recycle(Pengembalian::all())->create();
    }
}
