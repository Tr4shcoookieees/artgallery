<?php

namespace Database\Factories;

use App\Models\Style;
use Closure;
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
        $trueFalse = [
            true,
            false,
        ];
        $condition = [
            ['ru' => 'Картина в идеальном состоянии', 'en' => 'The painting is in perfect condition'],
            ['ru' => 'Картина в хорошем состоянии', 'en' => 'The painting is in good condition'],
            ['ru' => 'Картина в плохом состоянии', 'en' => 'The painting is in bad condition'],
        ];
        return [
            'title' => fake()->sentence(3),
            'author_id' => rand(1, 10),
            'category_id' => rand(1, 5),
            'image' => $artwork[rand(0, 2)],
            'description' => fake()->paragraph(4),
            'info' => [
                'is_unique' => fake()->boolean,
                'is_sold' => fake()->boolean,
                'condition' => $condition[rand(0, 2)],
                'size' => rand(50, 300) . 'x' . rand(50, 300),
                'year' => rand(1900, 2023),
                'style_id' => rand(1, Style::count()),
                'material' => [
                    'ru' => fake()->word(),
                    'en' => fake()->word(),
                ],
            ],
            'price' => fake()->randomFloat(10, 0, 700000),
        ];
    }
}
