<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->realText($maxNbChars = 20, $indexSize = 2),
            'summary' => $this->faker->unique()->sentences($nb = 3, $asText = true),
            'content' => $this->faker->unique()->paragraphs($nb = 4, $asText = true),
            'cover_url' => 'https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80',
            'reading_time' => $this->faker->randomDigitNotNull,
            'is_featured' => $this->faker->randomFloat($nbMaxDecimals = 0, $min = 0, $max = 1),
        ];
    }
}
