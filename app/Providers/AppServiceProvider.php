<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Throwable;

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
        // Force HTTPS links in production (behind the platform's TLS proxy)
        // so assets, images, and the admin panel load over https.
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Make site settings available to every view (nav, footer, etc.).
        View::composer('*', function ($view) {
            try {
                $view->with('site', SiteSetting::current());
            } catch (Throwable $e) {
                $view->with('site', new SiteSetting());
            }
        });
    }
}
