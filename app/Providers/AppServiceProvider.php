<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;
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
        // Use root-relative asset URLs so CSS/JS work on HTTPS even if
        // APP_URL is configured as http:// (avoids mixed-content blocking).
        Vite::createAssetPathsUsing(fn (string $path) => '/'.ltrim($path, '/'));

        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
