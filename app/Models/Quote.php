<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Quote extends Model
{

    protected $casts = [
        'tags' => 'array',
        'is_favorite' => 'boolean'
    ];

    public function getIsFavoriteAttribute(): bool
    {
        return $this->users()->where('user_id', request()->user()->id)->exists();
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorite_quotes');
    }
}
