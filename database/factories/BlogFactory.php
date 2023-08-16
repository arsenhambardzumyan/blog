<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'title' => $this->faker->words(5, true),
            'slug' => $this->faker->words(5, true),
            'blog_category_id' => $this->faker->randomNumber(),
            'description' => '',
            'status' => $this->faker->boolean(),
            'ordering' => $this->faker->randomNumber(),
        ];
    }

}
