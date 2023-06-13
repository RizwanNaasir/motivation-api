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
        return StoryResource::collection(Story::all());
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
}
