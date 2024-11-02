<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medical>
 */
class MedicalFactory extends Factory
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
            'date_appointment'  => fake()->dateTime(),
            'user_creator_id'   => fake()->numberBetween(1,2),
            'user_medical_id'   => fake()->numberBetween(1,2),
        ];
    }
}
