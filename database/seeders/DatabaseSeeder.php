<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Artwork;
use App\Models\Author;
use App\Models\City;
use App\Models\Color;
use App\Models\Order;
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
            MaterialSeeder::class,
            StatusSeeder::class,
            RoleSeeder::class
        ]);

        /*
         * Factories
         */
        City::factory(10)->create();
        User::factory(100)->afterMaking(function (User $user) {
            $user->city_id = City::all()->random()->id;
            $user->save();
            if (rand(0, 2) == 1) {
                Author::factory()->count(1)->for($user)->create();
                $user->role_id = 2;
                $user->save();
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
        })->count(250)->create();

        Order::factory(150)->create();

        User::create([
            'role_id' => 3,
            'name' => 'Maxim Abdreikin',
            'email' => 'max.holyboy@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone' => '+7-900-900-9090',
            'age' => 21,
            'city_id' => City::all()->random()->id,
            'gender' => 'male',
        ]);
    }
}
