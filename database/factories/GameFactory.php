<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->name(),
            'color' => $this->faker->hexColor(),
            'price' => $this->faker->randomFloat(1, 0, 150),
            'description' => $this->faker->paragraph(),
            'poster_image' => $this->faker->imageUrl(),
            'cover_image' => $this->faker->imageUrl(),
            'release_date' => $this->faker->date(),
            'rating' => $this->faker->numberBetween(1, 5),
            'epic_link' => $this->faker->url(),
            'steam_link' => $this->faker->url(),
        ];
    }
}
