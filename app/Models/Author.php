<?php

namespace App\Models;

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

    protected $with = [
        'user'
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

    public function city(): HasOneThrough
    {
        return $this->hasOneThrough(City::class, User::class);
    }

    /*
     * Attributes
     */
//    protected function bio(): Attribute
//    {
//        return Attribute::make(
//            get: fn($value, array $attributes) => json_decode($attributes['bio'])->header,
//            set: fn($value) => $value,
//        );
//    }
}
