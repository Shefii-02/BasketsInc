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
        //
        $theme = \App\Models\Theme::first();
        view()->share('title', 'Baskets inc');
        view()->share('keywords', 'Baskets inc');
        view()->share('description', 'Baskets inc');
        view()->share('theme', $theme->theme_code ?? 'theme-1');

    }
}


