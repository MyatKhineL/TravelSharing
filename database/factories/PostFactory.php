<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(50);
        $slug = Str::slug($title);
        $description = $this->faker->realText(2000);
        $excerpt = Str::words($description,50);
        return [
            "title" => $title,
            'slug' => $slug,
            'description' => $description,
            'excerpt' => $excerpt,
            'cover' => "",
            'user_id' => User::all()->random()->id,
        ];
    }
}
