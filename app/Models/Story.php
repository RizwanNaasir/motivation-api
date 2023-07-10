<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Story extends Model
{
    use HasFactory;

    public function getIsFavoriteAttribute(): bool
    {
        return $this->users()->where('user_id', request()->user()->id)->exists();
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorite_stories');
    }
}
