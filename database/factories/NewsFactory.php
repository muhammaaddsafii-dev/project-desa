<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Create a new user or use an existing one
            'title' => $this->faker->sentence(6), // Generate a title with 6 words
            'slug' => Str::slug($this->faker->sentence(6)), // Generate a slug from the title
            'published_at' => $this->faker->dateTimeThisYear(), // Generate a random date and time this year
            'image' => $this->faker->imageUrl(), // Generate a random image URL
            'content' => $this->faker->text(65535), // Generate random text up to 65535 characters
        ];
    }
}
