<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                'user_id'    => User::factory(),
                'title'      => ucfirst($this->faker->words(4, true)),
                'body'       => ucfirst($this->faker->sentences(4, true)),
                'created_at' => $this->faker->dateTimeBetween('-30 days', now()),
        ];
    }
}
