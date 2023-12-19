<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserLanguage>
 */
class UserLanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $languageLevel = [
            'beginner',
            'intermediate',
            'expert',
            'native',
        ];

        return [
            'language' => fake()->languageCode(),
            'language_level' => fake()->randomElement($languageLevel),
            'user_id' => fake()->numberBetween(1,100),
        ];
    }
}
