<?php

namespace Buchin\LaravelTermapi;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;


class LaravelTermapiServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $router->pushMiddlewareToGroup('web', \Buchin\LaravelTermapi\Middleware\SaveTerm::class);
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'buchin');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'buchin');
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
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laraveltermapi.php', 'laraveltermapi');

        // Register the service the package provides.
        $this->app->singleton('laraveltermapi', function ($app) {
            return new LaravelTermapi;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laraveltermapi'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laraveltermapi.php' => config_path('laraveltermapi.php'),
        ], 'laraveltermapi.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/buchin'),
        ], 'laraveltermapi.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/buchin'),
        ], 'laraveltermapi.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/buchin'),
        ], 'laraveltermapi.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
