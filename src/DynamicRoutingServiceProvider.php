<?php

namespace ElementsFramework\DynamicRouting;


use Illuminate\Support\ServiceProvider;

class DynamicRoutingServiceProvider extends ServiceProvider
{

    /**
     * Bootstraps the package.
     *
     * @return void
     */
    public function boot()
    {
        // Migrations
        $this->loadMigrationsFrom(__DIR__ . '/Migration');

        // Configuration publishing
        $this->publishes([
            __DIR__.'/Configuration/dynamic-routing.php' => config_path('dynamic-routing.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Commands
        $this->commands([
            Console\CompileRoutesCommand::class,
        ]);

        // Services
        $this->app->bind('ElementsFramework\DynamicRouting\Service\Compiler\RouteDeclarationCompiler', function($app) {
            return new Service\Compiler\RouteDeclarationCompiler();
        });
    }

}