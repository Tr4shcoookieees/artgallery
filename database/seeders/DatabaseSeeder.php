<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Artwork;
use App\Models\Author;
use App\Models\City;
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
        /*
         * Seeders
         */
        $this->call([
            CurrencySeeder::class,
            CountrySeeder::class,
            CategorySeeder::class,
            StyleSeeder::class,
            ThemeSeeder::class,
            ColorSeeder::class,
            MaterialSeeder::class
        ]);

        /*
         * Factories
         */
        City::factory(10)->create();
        User::factory(100)->afterMaking(function (User $user) {
            $user->city_id = City::all()->random()->id;
            $user->save();
            if (rand(0, 1) == 1) {
                Author::factory()->count(1)->for($user)->create();
            }
        })->create();
        Artwork::factory()->afterCreating(function (Artwork $artwork) {
            $style_ids = Style::inRandomOrder()->limit(rand(2, 4))->pluck('id')->toArray();
            foreach ($style_ids as $style_id) {
                $artwork->styles()->attach($style_id);
            }

            $color_ids = Color::inRandomOrder()->limit(rand(2, 4))->pluck('id')->toArray();
            foreach ($color_ids as $color_id) {
                $artwork->colors()->attach($color_id);
            }

            $material_ids = match ($artwork->category->name) {
                'painting' => [rand(1, 2), rand(3, 6)],
                'graphic' => [1, rand(7, 11)],
                'NFT' => [12],
                'sculpture' => [rand(13, 22)],
                default => [],
            };
            foreach ($material_ids as $material_id) {
                $artwork->materials()->attach($material_id);
            }
        })->for(Author::all()->random())->count(250)->create();
    }
}
