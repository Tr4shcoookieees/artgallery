<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Currency extends Model
{
    public function countries(): HasMany
    {
        return $this->hasMany(Country::class);
    }
}
