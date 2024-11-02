<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Horse>
 */
class HorseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'       => fake()->name(),
            'date_birth' => fake()->date('Y-m-d'),
            'race'       => fake()->text(10),
            'color'      => fake()->hexColor(),

            'user_id'    => fake()->numberBetween(1, 2),
        ];
    }
}
