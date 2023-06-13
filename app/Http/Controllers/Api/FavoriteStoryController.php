<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\FavoriteStoryRequest;
use App\Http\Resources\Api\FavoriteStoryResource;
use App\Models\FavoriteStory;

class FavoriteStoryController extends Controller
{
    public function index()
    {
        return FavoriteStoryResource::collection(FavoriteStory::all());
    }

    public function store(FavoriteStoryRequest $request)
    {
        return new FavoriteStoryResource(FavoriteStory::create($request->validated()));
    }

    public function show(FavoriteStory $favoriteStory)
    {
        return new FavoriteStoryResource($favoriteStory);
    }

    public function update(FavoriteStoryRequest $request, FavoriteStory $favoriteStory)
    {
        $favoriteStory->update($request->validated());

        return new FavoriteStoryResource($favoriteStory);
    }

    public function destroy(FavoriteStory $favoriteStory)
    {
        $favoriteStory->delete();

        return response()->json();
    }
}
