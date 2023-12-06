<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'translations' => [
                'en' => 'Animals',
                'ru' => 'Животные',
            ]
        ]);
        Theme::updateOrCreate([
            'name' => 'vehicle',
            'translations' => [
                'en' => 'Vehicle',
                'ru' => 'Транспорт',
            ]
        ]);
        Theme::updateOrCreate([
            'name' => 'nature',
            'translations' => [
                'en' => 'Nature',
                'ru' => 'Природа',
            ]
        ]);
        Theme::updateOrCreate([
            'name' => 'people',
            'translations' => [
                'en' => 'People',
                'ru' => 'Люди',
            ]
        ]);
        Theme::updateOrCreate([
            'name' => 'urban',
            'translations' => [
                'en' => 'Urban',
                'ru' => 'Город',
            ]
        ]);
    }
}
