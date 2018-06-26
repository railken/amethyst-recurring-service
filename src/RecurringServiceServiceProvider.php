<?php

namespace Railken\LaraOre;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Railken\LaraOre\Api\Support\Router;

class RecurringServiceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/../config/ore.recurring-service.php' => config_path('ore.recurring-service.php')], 'config');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutes();

        config(['ore.permission.managers' => array_merge(Config::get('ore.permission.managers', []), [
            \Railken\LaraOre\RecurringService\RecurringServiceManager::class,
        ])]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Railken\Laravel\Manager\ManagerServiceProvider::class);
        $this->app->register(\Railken\LaraOre\UserServiceProvider::class);
        $this->app->register(\Railken\LaraOre\ApiServiceProvider::class);
        $this->app->register(\Railken\LaraOre\TaxServiceProvider::class);
        $this->mergeConfigFrom(__DIR__.'/../config/ore.recurring-service.php', 'ore.recurring-service');
    }

    /**
     * Load routes.
     *
     * @return void
     */
    public function loadRoutes()
    {
        Router::group(array_merge(Config::get('ore.recurring-service.router'), [
            'namespace' => 'Railken\LaraOre\Http\Controllers',
        ]), function ($router) {
            $router->get('/', ['uses' => 'RecurringServicesController@index']);
            $router->post('/', ['uses' => 'RecurringServicesController@create']);
            $router->put('/{id}', ['uses' => 'RecurringServicesController@update']);
            $router->delete('/{id}', ['uses' => 'RecurringServicesController@remove']);
            $router->get('/{id}', ['uses' => 'RecurringServicesController@show']);
        });
    }
}
