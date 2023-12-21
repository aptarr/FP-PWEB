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

        $lama_sewa = [
            1, 3, 6, 12
        ];
        
        return [
            'lama_sewa' => fake()->randomElement($lama_sewa),
            'tanggal_mulai_sewa' => $this->faker->dateTimeBetween('-2 years', '-1 week')->format('Y-m-d'),
            'harga_total' => fake()->numberBetween(500000,1000000),
            'user_id' => fake()->numberBetween(1,100),
            'isReview' => fake()->randomElement([true, false]),
            'service_id' => fake()->numberBetween(1,150),
        ];
    }
}
