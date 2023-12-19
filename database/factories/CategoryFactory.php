<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // static $order = ['Graphics & Design', 'Programming & Tech', 'Digital Marketing', 'd'];

        // return [
        //     'category_name' => array_shift($order),
        // ];

        return [
            'category_name' => fake()->word(),  
        ];
    }
}
