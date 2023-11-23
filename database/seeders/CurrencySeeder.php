<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    public function run(): void
    {
        Currency::updateOrCreate(['code' => 'USD'], ['name' => 'US Dollar', 'symbol' => '$']);
        Currency::updateOrCreate(['code' => 'EUR'], ['name' => 'Euro', 'symbol' => '€']);
        Currency::updateOrCreate(['code' => 'GBP'], ['name' => 'British Pound', 'symbol' => '£']);
        Currency::updateOrCreate(['code' => 'RUB'], ['name' => 'Российский Рубль', 'symbol' => '₽']);
    }
}
