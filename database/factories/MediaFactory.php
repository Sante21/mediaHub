<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            // 'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(),
            'release_year' => $this->faker->numberBetween(1950, 2025),
            'type' => $this->faker->randomElement(['movie', 'series', 'game']),
            // 'category' => $this->faker->randomElement(['horror', 'Thriller', 'Fantasy', 'Action', 'Comedy', 'Post-Apocaliptic', 'Historical']),
        ];
    }

}
