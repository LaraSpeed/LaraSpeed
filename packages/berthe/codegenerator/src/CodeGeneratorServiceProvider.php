<?php

namespace Berthe\Codegenerator;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class CodeGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'templates');

        //Cmd
        $this->app->bind('Berthe\Codegenerator\GenerateCodeCmd', function($app) {
            return new GenerateCodeCmd();
        });
        $this->commands(array(
            'Berthe\Codegenerator\GenerateCodeCmd'
        ));

        //Event
        Event::listen('launch', 'App\in\GeneratorCode@index');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //include __DIR__.'/routes.php';
        $this->app->make('Berthe\Codegenerator\CallGenerator');
        $this->app->make('Berthe\Codegenerator\MCD');
	    $this->app->make('Berthe\Codegenerator\FileGenerator');
        //$this->app->make('Berthe\Codegenerator\ILaravelCodeGenerator');
        $this->app->make('Berthe\Codegenerator\LaravelCodeGenerator');
        $this->app->make('Berthe\Codegenerator\TemplateProvider');
        $this->app->bind('Berthe\Codegenerator\ILaravelCodeGenerator', 'Berthe\Codegenerator\LaravelCodeGenerator');
    }
}
