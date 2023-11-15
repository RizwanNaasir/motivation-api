<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'quantity',
        'description',
        'image',
        'price',
        'category',
        'ratings_count',
        'ratings_rate'
    ];

    protected $casts = [
        'ratings' => 'array',
    ];
}
