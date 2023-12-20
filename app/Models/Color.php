<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Color extends Model
{
    public function artworks(): BelongsToMany
    {
        return $this->belongsToMany(Artwork::class, 'artwork_styles');
    }

    protected function nameNormalize(): Attribute
    {
        return Attribute::make(
            get: fn($value, array $attributes) => __(ucfirst(str_replace('_', ' ', $attributes['name']))),
        );
    }
}
