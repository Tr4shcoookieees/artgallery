<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    protected $casts = [
        'bio' => 'json'
    ];

    public function artworks(): HasMany
    {
        return $this->hasMany(Artwork::class, 'author_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
