<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::updateOrCreate(['name' => 'painting']);
        Category::updateOrCreate(['name' => 'graphic']);
        Category::updateOrCreate(['name' => 'photo']);
        Category::updateOrCreate(['name' => 'sculpture']);
        Category::updateOrCreate(['name' => 'NFT']);
    }
}
