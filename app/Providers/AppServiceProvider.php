<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share errors bag with all views to prevent undefined variable errors
        view()->share('errors', session()->get('errors', new \Illuminate\Support\ViewErrorBag()));
    }
}
