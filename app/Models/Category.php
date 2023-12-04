<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $casts = [
        'translations' => 'json'
    ];

    public function artworks(): HasMany
    {
        return $this->hasMany(Artwork::class);
    }
}
