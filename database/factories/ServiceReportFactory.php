<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceReport>
 */
class ServiceReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        $reportType = [
            'Inappropriate',
            'Explicit Content',
            'Harassment',
            'Spam',
            'Unrelated'
        ];

        return [
            'report_type' => fake()->randomElement($reportType),
            'description' => fake()->text(),
            'service_id' => fake()->numberBetween(1,150),
        ];
    }
}
