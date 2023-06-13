<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Quote extends Model
{

    protected $casts = [
        'tags' => 'array'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorite_quotes');
    }
}
