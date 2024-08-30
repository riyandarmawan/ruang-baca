<?php

namespace Database\Factories;

use App\Models\Buku;
use App\Models\Pengembalian;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DetailPengembalianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_pengembalian' => Pengembalian::factory(),
            'kode_buku' => Buku::factory(),
            'jumlah' => fake()->numberBetween()
        ];
    }
}
