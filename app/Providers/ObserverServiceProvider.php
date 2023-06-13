<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot(): void
    {
        User::observe(UserObserver::class);
    }
}
