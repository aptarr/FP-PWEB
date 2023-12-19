<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $status = [
            'cancelled',
            'pending',
            'completed',
        ];
        
        return [
            'quantity' => fake()->numberBetween(1,10),
            'status' => fake()->randomElement($status),
            'harga_total' => fake()->numberBetween(500000,1000000),
            'user_id' => fake()->numberBetween(1,100),
            'isReview' => fake()->randomElement([true, false]),
            'service_id' => fake()->numberBetween(1,150),
        ];
    }
}
