<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserEducation>
 */
class UserEducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $educationTitle = [
            'Bachelor',
            'Master',
            'Phd'
        ];

        $collegeMajor = [
            'Computer Science',
            'Biology',
            'Psychology',
            'History',
            'Engineering',
            'Mathematics',
            'English',
            'Political Science',
            'Business Administration',
            'Art',
            'Physics',
            'Chemistry',
            'Sociology',
            'Communications'
        ];
        return [
            'country_of_college' => fake()->country(),
            'title' => fake()->randomElement($educationTitle),
            'major' => fake()->randomElement($collegeMajor),
            'year' => fake()->year(),
            'user_id' => fake()->numberBetween(1,100),
        ];
    }
}
