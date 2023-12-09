<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;

class Artwork extends Model
{
    use HasFactory;

    protected $casts = [
        'info' => 'json',
    ];

    protected $with = ['author', 'category'];

    /**
     * Relations
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    public function styles(): BelongsToMany
    {
        return $this->belongsToMany(Style::class, 'artwork_styles');
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'artwork_colors');
    }

    /**
     * Accessors & mutators
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => asset('assets/artworks/' . $value),
        );
    }

    protected function width(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => json_decode($attributes['info'])->width,
        );
    }

    protected function height(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => json_decode($attributes['info'])->height,
        );
    }

    protected function year(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => json_decode($attributes['info'])->year,
        );
    }

    protected function condition(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => json_decode($attributes['info'])->condition->{\App::getLocale()},
        );
    }

    protected function isSold(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => json_decode($attributes['info'])->is_sold,
        );
    }

    protected function isUnique(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => json_decode($attributes['info'])->isUnique,
        );
    }

    protected function material(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => json_decode($attributes['info'])->material->{\App::getLocale()},
        );
    }

    /**
     * Scopes
     */
    public function scopeFilter($query, Request $request): void
    {
        $filters = [
            'category' => function ($q) use ($request) {
                $q->whereHas('category', function ($q) use ($request) {
                    $q->where('name', $request->input('category'));
                });
            },
            'style' => function ($q) use ($request) {
                $styles = explode('%', $request->input('style'));
                $q->whereHas('styles', function ($q) use ($styles) {
                    $q->whereIn('name', $styles);
                });
            },
            'theme' => function ($q) use ($request) {
                $q->whereHas('theme', function ($q) use ($request) {
                    $q->where('name', $request->input('theme'));
                });
            },
            'color' => function ($q) use ($request) {
                $colors = explode('%', $request->input('color'));
                $q->whereHas('colors', function ($q) use ($colors) {
                    $q->whereIn('name', $colors);
                });
            },
            'price_from' => function ($q) use ($request) {
                $q->where('price', '>=', $request->input('price_from'));
            },
            'price_to' => function ($q) use ($request) {
                $q->where('price', '<=', $request->input('price_to'));
            },
            'sort' => function ($q) use ($request) {
                $sort = explode('%', $request->input('sort'));
                $sort_field = $sort[0];
                $sort_order = $sort[1] ?? 'asc';
                if ($sort_field === 'size') {
                    $q->orderByRaw('JSON_EXTRACT(info, "$.width") * JSON_EXTRACT(info, "$.height") ' . $sort_order);
                } else {
                    $q->orderBy($sort_field, $sort_order);
                }
            }
        ];
        foreach ($filters as $name => $callback) {
            if ($request->has($name)) {
                $callback($query);
            }
        }
    }
}
