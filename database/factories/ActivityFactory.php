<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3), // Generate a title with 3 words
            'image' => $this->faker->imageUrl(), // Generate a random image URL
            'description' => $this->faker->text(255), // Generate a random text up to 255 characters
            'date' => $this->faker->date(), // Generate a random date
        ];
    }
}
