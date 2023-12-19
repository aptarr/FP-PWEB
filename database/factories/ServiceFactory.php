<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text(30),
            'description' => fake()->text(),
            'basic_plan_title' => fake()->sentence(2),
            'basic_plan_price' => fake()->numberBetween(1,20),
            'basic_plan_description' => fake()->text(50),
            'basic_plan_days' => fake()->numberBetween(1,7),
            'standard_plan_title' => fake()->sentence(2),
            'standard_plan_price' => fake()->numberBetween(20,50),
            'standard_plan_description' => fake()->text(50),
            'standard_plan_days' => fake()->numberBetween(7,14),
            'premium_plan_title' => fake()->sentence(2),
            'premium_plan_price' => fake()->numberBetween(50,100),
            'premium_plan_description' => fake()->text(50),
            'premium_plan_days' => fake()->numberBetween(14,30),
            'average_star' => 0,
            'user_id' => fake()->numberBetween(1,100),
            'category_id' => fake()->numberBetween(1,9),
            'subcategory_id' => fake()->numberBetween(1,18),
        ];
    }
}
