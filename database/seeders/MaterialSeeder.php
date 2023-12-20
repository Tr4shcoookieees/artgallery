<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Material::updateOrCreate(['name' => 'paper']); //1
        Material::updateOrCreate(['name' => 'canvas']); //2
        // Paintings
        Material::updateOrCreate(['name' => 'gouache']); //3
        Material::updateOrCreate(['name' => 'watercolor']);
        Material::updateOrCreate(['name' => 'acrylic']);
        Material::updateOrCreate(['name' => 'oil']); //6
        // Graphics
        Material::updateOrCreate(['name' => 'pencil']); //7
        Material::updateOrCreate(['name' => 'charcoal']);
        Material::updateOrCreate(['name' => 'pastel']);
        Material::updateOrCreate(['name' => 'chalk']);
        Material::updateOrCreate(['name' => 'marker']); //11
        // NFT
        Material::updateOrCreate(['name' => 'digital_painting']); //12
        // Sculptures
        Material::updateOrCreate(['name' => 'wood']); //13
        Material::updateOrCreate(['name' => 'stone']);
        Material::updateOrCreate(['name' => 'plastic']);
        Material::updateOrCreate(['name' => 'resin']);
        Material::updateOrCreate(['name' => 'bronze']);
        Material::updateOrCreate(['name' => 'stainless_steel']);
        Material::updateOrCreate(['name' => 'metals']);
        Material::updateOrCreate(['name' => 'wire']);
        Material::updateOrCreate(['name' => 'cardboard']);
        Material::updateOrCreate(['name' => 'ceramics']); //22
    }
}
