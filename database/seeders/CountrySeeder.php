<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        Country::updateOrCreate(['name' => 'Россия', 'code' => 'RUS', 'currency_code' => 'RUB']);
        Country::updateOrCreate(['name' => 'United States', 'code' => 'US', 'currency_code' => 'USD']);
        Country::updateOrCreate(['name' => 'Great Britain', 'code' => 'GB', 'currency_code' => 'GBP']);
    }
}
