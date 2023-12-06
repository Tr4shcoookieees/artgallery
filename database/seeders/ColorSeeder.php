<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Color::updateOrCreate([
            'name' => 'white',
            'translations' => [
                'ru' => 'Белый',
                'en' => 'White'
            ],
            'code' => '#ffffff'
        ]);
        Color::updateOrCreate([
            'name' => 'black',
            'translations' => [
                'ru' => 'Черный',
                'en' => 'Black'
            ],
            'code' => '#000000'
        ]);
        Color::updateOrCreate([
            'name' => 'red',
            'translations' => [
                'ru' => 'Красный',
                'en' => 'Red'
            ],
            'code' => '#ff0000'
        ]);
        Color::updateOrCreate([
            'name' => 'green',
            'translations' => [
                'ru' => 'Зеленый',
                'en' => 'Green'
            ],
            'code' => '#00ff00'
        ]);
        Color::updateOrCreate([
            'name' => 'blue',
            'translations' => [
                'ru' => 'Синий',
                'en' => 'Blue'
            ],
            'code' => '#0000ff'
        ]);
        Color::updateOrCreate([
            'name' => 'yellow',
            'translations' => [
                'ru' => 'Желтый',
                'en' => 'Yellow'
            ],
            'code' => '#ffff00'
        ]);
        Color::updateOrCreate([
            'name' => 'purple',
            'translations' => [
                'ru' => 'Фиолетовый',
                'en' => 'Purple'
            ],
            'code' => '#800080'
        ]);
        Color::updateOrCreate([
            'name' => 'orange',
            'translations' => [
                'ru' => 'Оранжевый',
                'en' => 'Orange'
            ],
            'code' => '#ffa500'
        ]);
    }
}
