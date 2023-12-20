<?php

namespace Database\Seeders;

use App\Models\Style;
use Illuminate\Database\Seeder;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Style::updateOrCreate([
            'name' => 'abstract',
        ]);
        Style::updateOrCreate([
            'name' => 'east_art',
        ]);
        Style::updateOrCreate([
            'name' => 'geometry',
        ]);
        Style::updateOrCreate([
            'name' => 'modern',
        ]);
        Style::updateOrCreate([
            'name' => 'classic',
        ]);
        Style::updateOrCreate([
            'name' => 'pop_art',
        ]);
        Style::updateOrCreate([
            'name' => 'surrealism',
        ]);
    }
}
