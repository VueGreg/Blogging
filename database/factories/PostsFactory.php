<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(3);

        return [
            'title' => $title,
            'text' => fake()->text(),
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
            'category_id' => function () {
                return Categories::inRandomOrder()->first()->id;
            },
        ];
    }
}
