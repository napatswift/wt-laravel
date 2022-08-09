<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'post_id'=>$this->faker->numberBetween(1, \App\Models\Post::count()),
            'message'=>$this->faker->realText('32'),
            'created_at'=>$this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
