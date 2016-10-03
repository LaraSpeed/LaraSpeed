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


        //Advanced Binded components.
        $this->app->make('Berthe\Codegenerator\SchemaTemplate');
        $this->app->make('Berthe\Codegenerator\ModelTemplate');
        $this->app->make('Berthe\Codegenerator\FormTemplate');
        $this->app->make('Berthe\Codegenerator\ControllerTemplate');
        $this->app->make('Berthe\Codegenerator\DisplayTemplate');
        $this->app->make('Berthe\Codegenerator\Laravel53Route');

        $this->app->make('Berthe\Codegenerator\FileUtils');

        $this->app->make('Berthe\Codegenerator\BasicNormalization');

        $this->app->when(InheritMaster::class)
            ->needs(NormalizeInterface::class)
            ->give(function () {
                return new BasicNormalization();
            });

        $this->app->make('Berthe\Codegenerator\InheritMaster');

        $this->app->make('Berthe\Codegenerator\AdvancedGenerator');

        $this->app->make('Berthe\Codegenerator\StringType');
        $this->app->make('Berthe\Codegenerator\IntegerType');
        $this->app->make('Berthe\Codegenerator\BigIncrementsType');
        $this->app->make('Berthe\Codegenerator\BigIntegerType');
        $this->app->make('Berthe\Codegenerator\BooleanType');
        $this->app->make('Berthe\Codegenerator\CharType');
        $this->app->make('Berthe\Codegenerator\DecimalType');
        $this->app->make('Berthe\Codegenerator\DoubleType');
        $this->app->make('Berthe\Codegenerator\FloatType');
        $this->app->make('Berthe\Codegenerator\IncrementsType');
        $this->app->make('Berthe\Codegenerator\LongTextType');
        $this->app->make('Berthe\Codegenerator\TinyIntegerType');
        $this->app->make('Berthe\Codegenerator\TextType');
        $this->app->make('Berthe\Codegenerator\TimeStampType');
        $this->app->make('Berthe\Codegenerator\EnumType');
        $this->app->make('Berthe\Codegenerator\SmallIntegerType');
        $this->app->make('Berthe\Codegenerator\SetType');

        $this->app->make('Berthe\Codegenerator\FormTemplateProvider');

    }
}
