<?php

namespace App\Models;


use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, MustVerifyEmail;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'avatar',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $dispatchesEvents = [
        'deleting' => \App\Events\User\UserDeleting::class,
        //
    ];

    public function author(): HasOne
    {
        return $this->hasOne(Author::class, 'user_id');
    }

    public function country(): HasOneThrough
    {
        return $this->hasOneThrough(Country::class, City::class);
    }

    public function artworks(): HasManyThrough
    {
        return $this->hasManyThrough(Artwork::class, Author::class);
    }

    protected function avatarNormalize(): Attribute
    {
        return Attribute::make(
            get: fn($value, array $attributes) => $attributes['avatar'] !== null
                ? asset('storage/uploads/avatars/' . $attributes['avatar'])
                : null,
        );
    }
}
