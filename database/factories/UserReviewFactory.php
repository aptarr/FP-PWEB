<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserReview>
 */
class UserReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'star_rating' => fake()->numberBetween(1,5),
            'review_description' => fake()->text(),
            'user_id' => fake()->numberBetween(1,100),
            'service_id' => fake()->numberBetween(1,150),
        ];
    }
}
