<?php

namespace Database\Factories;

use App\Models\Artwork;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $artwork = Artwork::inRandomOrder()->first();
        $user = User::where('id', '!=', $artwork->author->user_id)->inRandomOrder()->first();
        $author = $artwork->author;


        return [
            'status_id' => Status::inRandomOrder()->first()->id,
            'user_id' => $user->id,
            'artwork_id' => $artwork->id,
            'author_id' => $author->id,
            'price' => $artwork->price,
        ];
    }
}
