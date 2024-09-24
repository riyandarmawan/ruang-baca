<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kelas::factory(12)->create();

        $jurusanList = [
            'PPLG' => 'Pengembangan Perangkat Lunak dan Gim',
            'AK' => 'Teknik Akuntansi',
            'TO' => 'Teknik Otomotif',
            'TM' => 'Teknik Mesin',
        ];

        $tingkatList = ['X', 'XI', 'XII'];

        foreach ($tingkatList as $tingkat) {
            foreach ($jurusanList as $kode => $jurusan) {
                Kelas::create([
                    'kode_kelas' => "$tingkat-$kode",
                    'tingkat' => $tingkat,
                    'jurusan' => $jurusan,
                ]);
            }
        }
    }
}
