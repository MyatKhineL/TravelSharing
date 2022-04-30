<?php

namespace Database\Factories;

use App\Models\Post;
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
        return [
            "message" => $this->faker->realText(100),
            "user_id" => User::all()->random()->id,
            "post_id" => Post::all()->random()->id
        ];
    }
}
