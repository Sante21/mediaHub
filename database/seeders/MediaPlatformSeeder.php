<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MediaPlatform;

class MediaPlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // MediaPlatform::factory(10)->create();
        MediaPlatform::create(['media_id' => 1, 'platform_id' => 1]);
        MediaPlatform::create(['media_id' => 1, 'platform_id' => 2]);
    }
}
