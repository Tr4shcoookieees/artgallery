<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ArtworkStyle extends Model
{
    use HasFactory;

    protected $fillable = [
        'artwork_id',
        'style_id'
    ];
}
