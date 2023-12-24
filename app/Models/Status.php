<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    protected $fillable = ['name'];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function color(): string
    {
        return match ($this->name) {
            'pending' => 'bg-amber-200',
            'accepted' => 'bg-blue-200',
            'completed' => 'bg-green-200',
            'rejected' => 'bg-red-200',
            'cancelled' => 'bg-gray-200',
        };
    }
}
