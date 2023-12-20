<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Color::updateOrCreate(['name' => 'white', 'code' => '#ffffff']);
        Color::updateOrCreate(['name' => 'black', 'code' => '#000000']);
        Color::updateOrCreate(['name' => 'red', 'code' => '#ff0000']);
        Color::updateOrCreate(['name' => 'green', 'code' => '#00ff00']);
        Color::updateOrCreate(['name' => 'blue', 'code' => '#0000ff']);
        Color::updateOrCreate(['name' => 'yellow', 'code' => '#ffff00']);
        Color::updateOrCreate(['name' => 'purple', 'code' => '#800080']);
        Color::updateOrCreate(['name' => 'orange', 'code' => '#ffa500']);
    }
}
