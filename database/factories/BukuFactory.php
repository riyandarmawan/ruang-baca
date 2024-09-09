<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Support\Str;
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
            'kode_buku' => fake()->numerify('#############'),
            'sampul' => 'no-cover.png',
            'slug' => Str::slug(fake()->unique(true)->words(5, true)),
            'judul' => fake()->words(5, true),
            'penerbit' => fake()->words(2, true),
            'tahun_terbit' => fake()->year(),
            'jumlah_halaman' => fake()->numberBetween(100, 1000),
            'kategori_id' => Kategori::factory(),
            'deskripsi' => fake()->text(),
        ];
    }
}
