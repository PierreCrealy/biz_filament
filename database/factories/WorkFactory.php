<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Work>
 */
class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'             => fake()->title(),
            'description'       => fake()->text(50),
            'place'             => fake()->city(),
            'begin'             => fake()->dateTime(),
            'ending'            => fake()->dateTime(),
            'min_user'          => fake()->numberBetween(1,3),
            'max_user'          => fake()->numberBetween(1,8),
            'user_creator_id'   => fake()->numberBetween(1,2),
        ];
    }
}
