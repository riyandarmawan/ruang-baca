<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peminjaman>
 */
class PeminjamanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nisn' => Siswa::factory(),
            'tanggal_pinjam' => fake()->dateTimeBetween('-1 week')->format('Y-m-d'),
            'tanggal_kembali' => fake()->dateTimeBetween(now(), '+1 week')->format('Y-m-d')
        ];
    }
}
