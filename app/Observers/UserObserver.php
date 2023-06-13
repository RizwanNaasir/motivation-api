<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserObserver
{
    public function created(User $user)
    {

    }

    public function updated(User $user)
    {
    }

    public function deleted(User $user)
    {
        if (file_exists(public_path(Storage::url($user->avatar)))) {
            unlink(public_path(Storage::url($user->avatar)));
        };
    }

    public function restored(User $user)
    {
    }

    public function forceDeleted(User $user)
    {
    }
}
