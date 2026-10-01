<?php

namespace App\Providers;

use App\Models\CookiePreferencePage;
use Illuminate\Support\Facades\View;
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
        View::composer('includes.website.footer', function ($view) {

            $cookiePage = CookiePreferencePage::where('published', 1)->first();

            $view->with('cookiePage', $cookiePage);
        });
    }
}