<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Artwork;
use App\Models\ArtworkStyle;
use App\Models\Author;
use App\Models\Color;
use App\Models\Style;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CurrencySeeder::class,
            CountrySeeder::class,
            CategorySeeder::class,
            StyleSeeder::class,
            ThemeSeeder::class,
            ColorSeeder::class
        ]);
        User::factory(10)->create();
        Author::factory(10)->create();
        Artwork::factory()->afterCreating(function (Artwork $artwork) {
            $style_ids = Style::inRandomOrder()->limit(rand(2, 4))->pluck('id')->toArray();
            foreach ($style_ids as $style_id) {
                $artwork->styles()->attach($style_id);
            }
            $color_ids = Color::inRandomOrder()->limit(rand(2, 4))->pluck('id')->toArray();
            foreach ($color_ids as $color_id) {
                $artwork->colors()->attach($color_id);
            }
        })->count(250)->create();
    }
}
