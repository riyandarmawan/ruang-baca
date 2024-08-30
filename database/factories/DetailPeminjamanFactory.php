<?php

namespace Database\Factories;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DetailPeminjamanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_peminjaman' => Peminjaman::factory(),
            'kode_buku' => Buku::factory(),
            'jumlah' => fake()->numberBetween()
        ];
    }
}
