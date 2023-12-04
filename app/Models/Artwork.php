<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artwork extends Model
{
    use HasFactory;

    protected $casts = [
        'info' => 'json',
    ];

    protected $with = ['author'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function styles(): BelongsToMany
    {
        return $this->belongsToMany(Style::class, 'artwork_styles');
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => asset('assets/artworks/' . $value),
        );
    }

    public function scopeFilter($query, $request): void
    {
        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->input('category'));
            });
        }
        if ($request->has('style')) {
            $styles = explode('%', $request->input('style'));
            $query->whereHas('styles', function ($q) use ($styles) {
                $q->whereIn('name', $styles);
            });
        }
        if ($request->has('price_from')) {
            $query->where('price', '>=', $request->input('price_from'));
        }
        if ($request->has('price_to')) {
            $query->where('price', '<=', $request->input('price_to'));
        }
    }
}
