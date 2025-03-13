<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Collection;
use \App\Models\Media;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CollectionMedia>
 */
class CollectionMediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'collection_id' => Collection::factory(),
            'media_id' => Media::factory(),
        ];
    }
}
