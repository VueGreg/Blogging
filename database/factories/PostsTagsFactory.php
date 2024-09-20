<?php

namespace Database\Factories;

use App\Models\Posts;
use App\Models\Tags;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostsTags>
 */
class PostsTagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tags_id' => function () {
                return Tags::inRandomOrder()->first()->id;
            },
            'posts_id' => function () {
                return Posts::inRandomOrder()->first()->id;
            },
        ];
    }
}
