<?php

namespace App\Providers;

use App\Services\Lang;
use Illuminate\Support\ServiceProvider;

class LangServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('currentLang', function ($app) {
            return Lang::current();
        });

        $this->app->singleton('langs', function ($app) {
            return Lang::all();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
