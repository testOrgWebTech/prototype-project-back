<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Challenge;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'message' => $this->faker->paragraph(2),
            // 'user_id' => User::inRandomOrder()->first(),
            'category_id' => rand(1,5),
            //'challenge_id' => Challenge::inRandomOrder()->first(),
        ];
    }
}
