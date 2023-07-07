<?php

namespace App\Policies;

use App\Models\Goal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GoalPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        // Add your logic to determine if the user can view any goals here
        return true; // For simplicity, always allow viewing any goals
    }

    public function view(User $user, Goal $goal): bool
    {
        // Add your logic to determine if the user can view the goal here
        return $user->id === $goal->user_id; // Only allow if the user owns the goal
    }

    public function create(User $user): bool
    {
        // Add your logic to determine if the user can create goals here
        return true; // For simplicity, always allow creating goals
    }

    public function update(User $user, Goal $goal): bool
    {
        // Add your logic to determine if the user can update the goal here
        return $user->id === $goal->user_id; // Only allow if the user owns the goal
    }

    public function delete(User $user, Goal $goal): bool
    {
        // Add your logic to determine if the user can delete the goal here
        return $user->id === $goal->user_id; // Only allow if the user owns the goal
    }
}
