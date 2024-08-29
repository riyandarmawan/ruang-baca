<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_buku' => fake()->numerify('###-###-##-####-#'),
            'judul' => fake()->words(5, true),
            'penerbit' => fake()->words(2, true),
            'tahun_terbit' => fake()->year()
        ];
    }
}
