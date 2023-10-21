<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::updateOrCreate([
            'code' => 'USD',
            'name' => 'Доллар США',
        ]);

        Currency::updateOrCreate([
            'code' => 'EUR',
            'name' => 'Евро',
        ]);

        Currency::updateOrCreate([
            'code' => 'RUB',
            'name' => 'Рубль',
        ]);
    }
}
