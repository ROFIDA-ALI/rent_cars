<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'carTitle' => fake()->company(),
            'description' => fake()->text(),
            'shortdescription' => fake()->text(),
            'luggage' => fake()->numberBetween($min = 1, $max = 9),
            'doors' => fake()->numberBetween($min = 1, $max = 9),
            'passenger' => fake()->numberBetween($min = 1, $max = 9),
            'price' => fake()->numberBetween($min = 1, $max = 1000),

            'active' => 1,
            'image' => fake()->imageUrl(800,600),
            'category_id' => fake()->numberBetween($min = 1, $max = 2), 
        ];
    }
}
