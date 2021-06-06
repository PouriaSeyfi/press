<?php


namespace pouria\Press;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use pouria\Press\Console\ProcessCommand;

class PressBaseServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
        }
        $this->registerResources();
        $this->loadViewsFrom(__DIR__.'/../resources/views','press');
        $this->registerRoutes();
    }

    public function register()
    {
        $this->commands([
            ProcessCommand::class
        ]);

    }

    private function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__ . '/../config/press.php' => config_path('press.php')
        ],'press-config');
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(),function (){
           $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
          'prefix' => Press::path(),
          'namespace' => 'pouria\Press\Http\Controllers',
        ];
    }

}