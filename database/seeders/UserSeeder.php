<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@ruangbaca.id',
            'password' => Hash::make('superadmin'),
            'role' => 'superadmin'
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@ruangbaca.id',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);
        
        User::factory(10)->create();
    }
}
