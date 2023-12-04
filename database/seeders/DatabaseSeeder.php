<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Artwork;
use App\Models\ArtworkStyle;
use App\Models\Author;
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
            StyleSeeder::class
        ]);
        User::factory(10)->create();
        Author::factory(10)->create();
        Artwork::factory()->afterCreating(function (Artwork $artwork) {
            $style_ids = Style::inRandomOrder()->limit(3)->pluck('id')->toArray();
            foreach ($style_ids as $style_id) {
                $artwork->styles()->attach($style_id);
            }
//            $artwork->styles()->attach(1);
        })->count(250)->create();
    }
}
