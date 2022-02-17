<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::pluck('id')->toArray();
        $blogs = Blog::pluck('id')->toArray();

        return [
            'comment' => $this->faker->unique()->sentences($nb = 3, $asText = true),
            'user_id' => $this->faker->randomElement($users),
            'blog_id' => $this->faker->randomElement($blogs),
        ];
    }
}
