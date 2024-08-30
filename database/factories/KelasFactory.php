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
        $kodeKelas = fake()->unique()->randomElement(['X-PPLG', 'X-AK', 'X-TO', 'X-TM', 'XI-PPLG', 'XI-AK', 'XI-TO', 'XI-TM', 'XII-PPLG', 'XII-AK', 'XII-TO', 'XII-TM']);

        return [
            'kode_kelas' => $kodeKelas,
            'tingkat' => fake()->randomElement(['X', 'XI', 'XII']),
            'jurusan' => fake()->randomElement(['Pengembangan Perangkat Lunak dan Gim', 'Akuntansi', 'Teknik Otomotif', 'Teknik Mesin'])
        ];
    }
}
