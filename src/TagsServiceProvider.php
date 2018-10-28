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

        // tell laravel where to find the views
        $this->loadViewsFrom(__DIR__.'/resources/views', 'tags');

        // tell laravel where to publish views
        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/tjventurini/tags'),
        ]);

        // tell laravel where to find translations
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'tags');

        // tell laravel where to publish package translations
        $this->publishes([
            __DIR__.'/resources/lang' => resource_path('lang/vendor/tags'),
        ], 'lang');

        // include custom factories
        $this->app->make('Illuminate\Database\Eloquent\Factory')->load(__DIR__ . '/database/factories');
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
