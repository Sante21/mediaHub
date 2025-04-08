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
        Platform::create(['name' => 'Netflix', 'image' => 'images/platforms/Netflix.png']);
        Platform::create(['name' => 'Prime', 'image' => 'images/platforms/Prime.png']);
        Platform::create(['name' => 'Disney', 'image' => 'images/platforms/Disney.png']);
        Platform::create(['name' => 'Steam', 'image' => 'images/platforms/Steam.png']);
        Platform::create(['name' => 'Epic Games', 'image' => 'images/platforms/Epic Games.png']);
    }
}
