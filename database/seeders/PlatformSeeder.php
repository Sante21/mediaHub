<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Platform;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Platform::create(['name' => 'Netflix']);
        Platform::create(['name' => 'Prime']);
        Platform::create(['name' => 'Disney']);
        Platform::create(['name' => 'Steam']);
        Platform::create(['name' => 'Epic Games']);
        // Platform::factory(10)->create();
    }
}
