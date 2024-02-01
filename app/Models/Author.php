<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'nickname',
        'user_id',
        'bio',
    ];

    protected $casts = [
        'bio' => 'json'
    ];

    /*
     * Relations
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function artworks(): HasMany
    {
        return $this->hasMany(Artwork::class, 'author_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'author_id');
    }

    public function city(): HasOneThrough
    {
        return $this->hasOneThrough(City::class, User::class, 'id', 'id', 'user_id', 'city_id');
    }

    /*
     * Attributes
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->user->name,
        );
    }

    protected function email(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->user->email,
        );
    }
}
