<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['pending' => 'bg-amber', 'accepted' => 'bg-blue', 'rejected' => 'bg-red', 'cancelled' => 'bg-gray', 'completed' => 'bg-green'];

        foreach ($statuses as $status => $color) {
            Status::updateOrCreate([
                'name' => $status,
                'color' => $color
            ]);
        }
    }
}
