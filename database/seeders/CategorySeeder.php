<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::updateOrCreate([
            'name' => 'painting',
            'translations' => [
                'en' => 'Painting',
                'ru' => 'Картина',
            ],
        ]);
        Category::updateOrCreate([
            'name' => 'graphic',
            'translations' => [
                'en' => 'Graphic',
                'ru' => 'Графика',
            ],
        ]);
        Category::updateOrCreate([
            'name' => 'photo',
            'translations' => [
                'en' => 'Photo',
                'ru' => 'Фотография',
            ],
        ]);
        Category::updateOrCreate([
            'name' => 'sculpture',
            'translations' => [
                'en' => 'Sculpture',
                'ru' => 'Скульптура',
            ],
        ]);
        Category::updateOrCreate([
            'name' => 'nft',
            'translations' => [
                'en' => 'NFT',
                'ru' => 'Цифровое искусство',
            ],
        ]);
    }
}
