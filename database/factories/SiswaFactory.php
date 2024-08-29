<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kodeKelas = fake()->randomElement(['X', 'XI', 'XII']) . '-' . fake()->randomElement(['PPLG', 'AK', 'TO', 'TM']);

        return [
            'nisn' => fake()->numerify('##########'),
            'nama' => fake()->name(),
            'alamat' => fake()->address(),
            'no_telp' => fake()->phoneNumber(),
            'kode_kelas' => $kodeKelas
        ];
    }
}
