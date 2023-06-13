<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable implements
    MustVerifyEmail
{
    use HasApiTokens,
        HasFactory,
        Notifiable;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'full_name',
    ];

    public function fullName(): Attribute
    {
        return Attribute::make(get: fn() => ucfirst($this->name) . ' ' . ucfirst($this->surname));
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function favoriteQuotes(): BelongsToMany
    {
        return $this->belongsToMany(Quote::class, 'favorite_quotes');
    }

    public function favoriteStories(): HasMany
    {
        return $this->hasMany(FavoriteStory::class);
    }

    public function addToFavouriteQuotes(Quote $quote): bool
    {
        $isFavorite = $this->favoriteQuotes()->toggle($quote);

        return count($isFavorite['attached']) > 0;
    }
}
