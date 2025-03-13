<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Media;
use \App\Models\Platform;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MediaPlatform>
 */
class MediaPlatformFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'media_id' => Media::factory(),
            'platform_id' => Platform::factory(),
        ];
    }
}
