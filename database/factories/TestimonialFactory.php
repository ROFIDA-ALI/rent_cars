<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'testimonialName' => fake()->company(),
            'review' => fake()->text(),
            'position' => fake()->text(),    
            'image' => fake()->imageUrl(800,600),
            'published' => 1,

        ];
    }
}
