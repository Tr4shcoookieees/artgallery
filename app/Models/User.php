<?php

namespace App\Models;

use App\Events\User\UserAvatarUpdating;
use App\Events\User\UserDeleting;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'city_id',
        'name',
        'email',
        'avatar',
        'phone',
        'gender',
        'age',
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
        'deleting' => UserDeleting::class,
        'updating:avatar' => UserAvatarUpdating::class
    ];

    /**
     * Relationships
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function country(): HasOneThrough
    {
        return $this->hasOneThrough(Country::class, City::class, 'id', 'id', 'city_id', 'country_id');
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function author(): HasOne
    {
        return $this->hasOne(Author::class, 'user_id');
    }

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }

    public function artworks(): HasManyThrough
    {
        return $this->hasManyThrough(Artwork::class, Author::class);
    }

    /**
     * Attributes
     */
    protected function avatarNormalize(): Attribute
    {
        return Attribute::make(
            get: fn($value, array $attributes) => $attributes['avatar'] !== null
                ? asset('storage/uploads/avatars/' . $attributes['avatar'])
                : asset('storage/uploads/avatars/no-avatar.png'),
        );
    }

    protected function address(): Attribute
    {
        return Attribute::make(
            get: fn($value, array $attributes) => $this->city->name . ', ' . $this->country->code,
        );
    }
}
