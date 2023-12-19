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
            'kamar_tersedia' => fake()->numberBetween(1,10),
            'harga_per_bulan' => fake()->numberBetween(300000,1000000),
            'average_star' => 0,
            'user_id' => fake()->numberBetween(1,100),
            'subcategory_id' => fake()->numberBetween(1,9),
        ];
    }
}
