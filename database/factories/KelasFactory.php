<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
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
            'kode_kelas' => $kodeKelas,
            'tingkat' => fake()->randomElement(['X', 'XI', 'XII']),
            'jurusan' => fake()->randomElement(['Pengembangan Perangkat Lunak dan Gim', 'Akuntansi', 'Teknik Otomotif', 'Teknik Mesin'])
        ];
    }
}
