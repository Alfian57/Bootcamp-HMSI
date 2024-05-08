<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
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
        Blade::anonymousComponentNamespace('dashboard.components', 'dashboard');
        Blade::anonymousComponentNamespace('auth.components', 'auth');
        Blade::anonymousComponentNamespace('datatable.components', 'datatable');

        Blade::anonymousComponentNamespace('dashboard.layouts', 'dashboard-layouts');

        App::setLocale('id');
    }
}
