<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    public function run(): void
    {
//        Currency::updateOrCreate(['code' => 'USD'], ['name' => 'US Dollar', 'symbol' => '$']);
//        Currency::updateOrCreate(['code' => 'EUR'], ['name' => 'Euro', 'symbol' => '€']);
//        Currency::updateOrCreate(['code' => 'GBP'], ['name' => 'British Pound', 'symbol' => '£']);
//        Currency::updateOrCreate(['code' => 'RUB'], ['name' => 'Российский Рубль', 'symbol' => '₽']);
        \DB::table('currencies')->insert([
            ['code' => 'USD', 'name' => 'US Dollar', 'symbol' => '$'],
            ['code' => 'EUR', 'name' => 'Euro', 'symbol' => '€'],
            ['code' => 'GBP', 'name' => 'British Pound', 'symbol' => '£'],
            ['code' => 'RUB', 'name' => 'Российский Рубль', 'symbol' => '₽'],
        ]);
    }
}
