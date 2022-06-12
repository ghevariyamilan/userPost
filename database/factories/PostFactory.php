<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Post::class;

    public function definition(){
        $user = User::all()->random(1)->pluck('_id')->toArray();
        return [
            'user_id' => $user[0],
            'title' => $this->faker->sentence(10)
        ];
    }
}
