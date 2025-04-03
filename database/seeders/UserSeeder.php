<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Iker',
            'email' => 'ikersan2005@gmail.com',
            'password' => '12345678',
        ]);

        User::create([
            'name' => 'Steam',
            'email' => 'soporte@steam.com',
            'password' => '12345678',
        ]);

        User::create([
            'name' => 'Miguel',
            'email' => 'miguel@gmail.com',
            'password' => '12345678',
        ]);

        User::factory(10)->create();
    }
}
