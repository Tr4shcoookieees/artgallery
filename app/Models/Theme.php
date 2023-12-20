<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Theme extends Model
{
    public function artworks(): HasMany
    {
        return $this->hasMany(Artwork::class);
    }

    protected function nameNormalize(): Attribute
    {
        return Attribute::make(
            get: fn($value, array $attributes) => __(ucfirst(str_replace('_', ' ', $attributes['name']))),
        );
    }
}
