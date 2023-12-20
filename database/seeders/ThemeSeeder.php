<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Theme::updateOrCreate([
            'name' => 'animals',
        ]);
        Theme::updateOrCreate([
            'name' => 'vehicle',
        ]);
        Theme::updateOrCreate([
            'name' => 'nature',
        ]);
        Theme::updateOrCreate([
            'name' => 'people',
        ]);
        Theme::updateOrCreate([
            'name' => 'urban',
        ]);
    }
}
