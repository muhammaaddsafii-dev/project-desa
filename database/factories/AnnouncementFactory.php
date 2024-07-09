<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6), // Generate a title with 6 words
            'published_at' => $this->faker->dateTimeThisYear(), // Generate a random date and time this year
            'content' => $this->faker->text(65535), // Generate random text up to 65535 characters
        ];
    }
}
