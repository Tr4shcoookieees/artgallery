<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Http\Request;

class Artwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_id',
        'category_id',
        'theme_id',
        'image',
        'description',
        'info',
        'price',
        'quantity',
        'condition',
        'height',
        'is_sold',
        'is_unique',
        'width',
        'year',
    ];

    protected $casts = [
        'info' => 'array',
    ];

    /**
     * Relationships
     */
    public function user(): HasOneThrough
    {
        return $this->hasOneThrough(User::class, Author::class, 'id', 'id', 'author_id', 'user_id');
    }

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

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'artwork_id');
    }

    public function styles(): BelongsToMany
    {
        return $this->belongsToMany(Style::class, 'artwork_styles');
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'artwork_colors');
    }

    public function materials(): BelongsToMany
    {
        return $this->belongsToMany(Material::class, 'artwork_materials');
    }

    /**
     * Accessors & mutators
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value, array $attributes) => asset('storage/uploads/images/artworks/' . $attributes['image'])
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
            get: fn($value, $attributes) => json_decode($attributes['info'])->condition,
        );
    }

    protected function isUnique(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => json_decode($attributes['info'])->tags->is_unique,
        );
    }

    protected function isSold(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => json_decode($attributes['info'])->tags->is_sold,
        );
    }

    protected function tags(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => [
                'is_unique' => [
                    'value' => json_decode($attributes['info'])->tags->is_unique,
                    'text_node' => 'One of a kind',
                    'icon' => 'untitledui-diamond'
                ],
                'is_signed' => [
                    'value' => json_decode($attributes['info'])->tags->is_signed,
                    'text_node' => 'Artwork signed by the artist',
                    'icon' => 'fas-signature'
                ],
                'is_certified' => [
                    'value' => json_decode($attributes['info'])->tags->is_certified,
                    'text_node' => 'Certificate of Authenticity included',
                    'icon' => 'fluentui-certificate-20-o'
                ],
                'is_framed' => [
                    'value' => json_decode($attributes['info'])->tags->is_certified,
                    'text_node' => 'The painting comes in a frame',
                    'icon' => 'simpleline-frame'
                ]
            ],
        );
    }

    /**
     * Scopes
     */
    public function scopeFilter($query, Request $request): void
    {
        $filters = [
            'category' => function ($query) use ($request) {
                $query->whereHas('category', function ($query) use ($request) {
                    $query->where('name', $request->input('category'));
                });
            },
            'style' => function ($query) use ($request) {
                $styles = explode('%', $request->input('style'));
                $query->whereHas('styles', function ($query) use ($styles) {
                    $query->whereIn('name', $styles);
                });
            },
            'theme' => function ($query) use ($request) {
                $query->whereHas('theme', function ($query) use ($request) {
                    $query->where('name', $request->input('theme'));
                });
            },
            'color' => function ($query) use ($request) {
                $colors = explode('%', $request->input('color'));
                $query->whereHas('colors', function ($query) use ($colors) {
                    $query->whereIn('name', $colors);
                });
            },
            'material' => function ($query) use ($request) {
                $materials = explode('%', $request->input('material'));
                $query->whereHas('materials', function ($query) use ($materials) {
                    $query->whereIn('name', $materials);
                });
            },
            'price_from' => function ($query) use ($request) {
                $query->where('price', '>=', $request->input('price_from'));
            },
            'price_to' => function ($query) use ($request) {
                $query->where('price', '<=', $request->input('price_to'));
            },
            'sort' => function ($query) use ($request) {
                $sort = explode('%', $request->input('sort'));
                $sort_field = $sort[0];
                $sort_order = $sort[1] ?? 'asc';
                if ($sort_field === 'size') {
                    $query->orderByRaw("(info->>'width')::integer * (info->>'height')::integer $sort_order");
                } else {
                    $query->orderBy($sort_field, $sort_order);
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
