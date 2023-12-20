<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artwork>
 */
class ArtworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $artwork = [
            'art-sm.png',
            'art-md.png',
            'art-lg.png',
        ];
        $condition = [
            'The artwork is in perfect condition',
            'The artwork is in good condition',
            'The artwork is in bad condition',
        ];
        return [
            'title' => fake()->sentence(3),
            'author_id' => rand(1, 10),
            'category_id' => rand(1, 5),
            'theme_id' => rand(1, 5),
            'image' => $artwork[rand(0, 2)],
            'description' => fake()->paragraph(4),
            'info' => [
                'tags' => [
                    'is_unique' => fake()->boolean,
                    'is_signed' => fake()->boolean,
                    'is_certified' => fake()->boolean,
                    'is_framed' => fake()->boolean,
                    'is_sold' => fake()->boolean,
                ],
                'condition' => $condition[rand(0, 2)],
                'width' => rand(50, 300),
                'height' => rand(50, 300),
                'year' => rand(1900, 2023)
            ],
            'price' => fake()->randomFloat(10, 0, 700000),
        ];
    }
}
