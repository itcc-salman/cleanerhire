<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //Import Schema
use App\Observers\UserObserver;
use App\Models\User;
use Debugbar;

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
        if( !env('APP_DEBUGBAR') ) Debugbar::disable();
        Schema::defaultStringLength(191); //Solved by increasing StringLength
        User::observe(UserObserver::class);
    }
}
