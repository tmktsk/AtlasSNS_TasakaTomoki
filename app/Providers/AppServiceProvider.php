<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.login', function ($view) {
            $user = Auth::user();
            $followingCount = $user->following()->count();
            $followerCount = $user->followers()->count();
            $view->with('followingCount', $followingCount)
                ->with('followerCount', $followerCount);
        });
        //
    }
}
