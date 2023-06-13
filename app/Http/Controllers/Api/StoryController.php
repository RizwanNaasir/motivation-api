<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoryRequest;
use App\Http\Resources\Api\StoryResource;
use App\Models\Story;

class StoryController extends Controller
{
    public function index()
    {
        return $this->success(data: StoryResource::collection(Story::paginate(
            perPage: request()->integer('perPage', 5),
            page: request()->integer('page', 1)
        )));
    }

    public function store(StoryRequest $request)
    {
        return new StoryResource(Story::create($request->validated()));
    }

    public function show(Story $story)
    {
        return new StoryResource($story);
    }

    public function update(StoryRequest $request, Story $story)
    {
        $story->update($request->validated());

        return new StoryResource($story);
    }

    public function destroy(Story $story)
    {
        $story->delete();

        return response()->json();
    }

    public function like(Story $story)
    {
        $user = request()->user();
        if ($user->addToFavouriteStories($story)) {
            return $this->success(message: 'Story added to Favourite!');
        } else {
            return $this->success(message: 'Story removed from Favourite!');
        }
    }

    public function listFavouriteStories()
    {
        return $this->success(data: StoryResource::collection(request()->user()->favoriteStories));
    }
}
