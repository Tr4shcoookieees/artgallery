<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::updateOrCreate(['name' => 'user']);
        Role::updateOrCreate(['name' => 'author']);
        Role::updateOrCreate(['name' => 'admin']);
    }
}
