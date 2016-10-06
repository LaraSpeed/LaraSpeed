<?php

namespace Berthe\Codegenerator;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

use Berthe\Codegenerator\Normalizer\BasicNormalization;
use Berthe\Codegenerator\Normalizer\InheritMaster;
use Berthe\Codegenerator\Contrats\NormalizeInterface;

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
        $this->app->make('Berthe\Codegenerator\Core\CallGenerator');
        $this->app->make('Berthe\Codegenerator\Core\MCD');
	    $this->app->make('Berthe\Codegenerator\Core\FileGenerator');
        //$this->app->bind('Berthe\Codegenerator\ILaravelCodeGenerator');
        $this->app->make('Berthe\Codegenerator\Core\LaravelCodeGenerator');
        $this->app->make('Berthe\Codegenerator\Utils\TemplateProvider');
        $this->app->bind('Berthe\Codegenerator\Contrats\ILaravelCodeGenerator', 'Berthe\Codegenerator\Core\LaravelCodeGenerator');


        //Advanced Binded components.
        $this->app->make('Berthe\Codegenerator\Templates\SchemaTemplate');
        $this->app->make('Berthe\Codegenerator\Templates\ModelTemplate');
        $this->app->make('Berthe\Codegenerator\Templates\FormTemplate');
        $this->app->make('Berthe\Codegenerator\Templates\ControllerTemplate');
        $this->app->make('Berthe\Codegenerator\Templates\DisplayTemplate');
        $this->app->make('Berthe\Codegenerator\Templates\SingleDisplayTemplate');
        $this->app->make('Berthe\Codegenerator\Routess\Laravel53Route');

        $this->app->make('Berthe\Codegenerator\Utils\FileUtils');

        $this->app->make('Berthe\Codegenerator\Normalizer\BasicNormalization');

        $this->app->when(InheritMaster::class)
            ->needs(NormalizeInterface::class)
            ->give(function () {
                return new BasicNormalization();
            });

        $this->app->make('Berthe\Codegenerator\Normalizer\InheritMaster');

        $this->app->make('Berthe\Codegenerator\Core\AdvancedGenerator');
        $this->app->make('Berthe\Codegenerator\Core\LaravelCodeGenerator');

        $this->app->make('Berthe\Codegenerator\MCDType\StringType');
        $this->app->make('Berthe\Codegenerator\MCDType\IntegerType');
        $this->app->make('Berthe\Codegenerator\MCDType\BigIncrementsType');
        $this->app->make('Berthe\Codegenerator\MCDType\BigIntegerType');
        $this->app->make('Berthe\Codegenerator\MCDType\BooleanType');
        $this->app->make('Berthe\Codegenerator\MCDType\CharType');
        $this->app->make('Berthe\Codegenerator\MCDType\DecimalType');
        $this->app->make('Berthe\Codegenerator\MCDType\DoubleType');
        $this->app->make('Berthe\Codegenerator\MCDType\FloatType');
        $this->app->make('Berthe\Codegenerator\MCDType\IncrementsType');
        $this->app->make('Berthe\Codegenerator\MCDType\LongTextType');
        $this->app->make('Berthe\Codegenerator\MCDType\TinyIntegerType');
        $this->app->make('Berthe\Codegenerator\MCDType\TextType');
        $this->app->make('Berthe\Codegenerator\MCDType\TimeStampType');
        $this->app->make('Berthe\Codegenerator\MCDType\EnumType');
        $this->app->make('Berthe\Codegenerator\MCDType\SmallIntegerType');
        $this->app->make('Berthe\Codegenerator\MCDType\SetType');

        $this->app->make('Berthe\Codegenerator\Utils\FormTemplateProvider');
        $this->app->make('Berthe\Codegenerator\Utils\Helper');

    }
}
