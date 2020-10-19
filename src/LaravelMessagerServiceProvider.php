<?php

namespace Maximof\LaravelMessager;

use Illuminate\Support\ServiceProvider;

class LaravelMessagerServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'maximof');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'maximof');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-messager.php', 'laravel-messager');

        // Register the service the package provides.
        $this->app->singleton('laravel-messager', function ($app) {
            return new LaravelMessager;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-messager'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravel-messager.php' => config_path('laravel-messager.php'),
        ], 'laravel-messager.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/maximof'),
        ], 'laravel-messager.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/maximof'),
        ], 'laravel-messager.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/maximof'),
        ], 'laravel-messager.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
