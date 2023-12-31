<?php

namespace App\Http\Resources\Api;

use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Quote */
class QuoteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'author' => $this->author,
            'tags' => $this->tags,
            'author_slug' => $this->author_slug,
            'length' => $this->length,
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans(),
            'is_liked' => $this->is_favorite,
        ];
    }
}
