<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nickname' => fake()->userName(),
            'user_id' => fake()->numberBetween(1, 10),
            'bio' => [
                'age' => fake()->numberBetween(10, 85),
                'gender' => fake()->randomElement(['male', 'female']),
                'country' => fake()->country(),
                'city' => fake()->city(),
                'website' => fake()->url(),
            ]
        ];
    }
}
