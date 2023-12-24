<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Resources\CollectsResources;

class Category extends Model
{
    use CollectsResources;

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
