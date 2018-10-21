<?php

namespace Tjventurini\Tags;

use Illuminate\Support\ServiceProvider;

class TagsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // tell laravel where to find the migrations.
        $this->loadMigrationsFrom(__DIR__.'/database/migrations/');

        // tell laravel where to find routes
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        // tell laravel where to find translations
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'tags');

        // tell laravel where to publish package translations
        $this->publishes([
            __DIR__.'/resources/lang' => resource_path('lang/vendor/tags'),
        ], 'lang');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
