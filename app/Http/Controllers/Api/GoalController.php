<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GoalRequest;
use App\Http\Resources\GoalResource;
use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        return $this->success(data: GoalResource::collection($user->goals()->paginate()));
    }

    public function store(GoalRequest $request)
    {
        $goal = $request->user()->goals()->create($request->validated());

        return $this->success(data: new GoalResource($goal));
    }

    public function show(Goal $goal)
    {
        return $this->success(data: new GoalResource($goal));
    }

    public function update(GoalRequest $request, Goal $goal)
    {
        $goal->update($request->validated());

        return $this->success(data: new GoalResource($goal));
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();

        return response()->json();
    }
}
