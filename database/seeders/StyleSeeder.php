<?php

namespace Database\Seeders;

use App\Models\Style;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'translations' => [
                "ru" => "Абстрактный",
                "en" => "Abstract",
            ]
        ]);
        Style::updateOrCreate([
            'name' => 'east_art',
            'translations' => [
                "ru" => "Восточное искусство",
                "en" => "East art",
            ]
        ]);
        Style::updateOrCreate([
            'name' => 'geometry',
            'translations' => [
                "ru" => "Геометрический",
                "en" => "Geometry",
            ]
        ]);
        Style::updateOrCreate([
            'name' => 'modern',
            'translations' => [
                "ru" => "Модерн",
                "en" => "Modern",
            ]
        ]);
        Style::updateOrCreate([
            'name' => 'classic',
            'translations' => [
                "ru" => "Классический",
                "en" => "Classic",
            ]
        ]);
        Style::updateOrCreate([
            'name' => 'pop_art',
            'translations' => [
                "ru" => "Поп-арт",
                "en" => "Pop art",
            ]
        ]);
        Style::updateOrCreate([
            'name' => 'surrealism',
            'translations' => [
                "ru" => "Сюрреализм",
                "en" => "Surrealism",
            ]
        ]);
    }
}
