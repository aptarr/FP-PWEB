<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserCertification>
 */
class UserCertificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'certificate_name' => fake()->sentence(3),
            'certification_from' => fake()->company(),
            'year' => fake()->year(),
            'user_id' => fake()->numberBetween(1,100),
        ];
    }
}
