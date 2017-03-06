<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 01/09/16
 * Time: 05:40 م
 *
 * This Class is use by "app/in/GeneratorCode.php" to handle generation of code when type on command line "php artisan code:generate",
 * It use AdvancedGenerator Cass to generate different components of the project such as :
 *  (Table insert and update Forms, display, schema, model, controller)
 * .
 */

namespace Berthe\Codegenerator\Core;
use Berthe\Codegenerator\Core\AdvancedGenerator;
use Berthe\Codegenerator\Templates\SideBarTemplate;

class CallGenerator
{
    /**
     * Use to get routes for relation between tables
     *
     * @var array
     */
    public $routes;

    /**
     * Get the "Conceptual Data Model" as an array.
     * It's actually the one overrided in "app/in/GeneratorCode.php" file to define "Conceptual Data Model".
     *
     * @return array
     */
    public function getSite(){
        return array();
    }

    /**
     * Set $route variable
     *
     * @param array $routes
     */
    public function setRoutes($routes = array()){
        $this->routes = $routes;
    }

    /**
     * Generate different component (Controllers, Schemas, Models and forms).
     * It's fired when "php artisan code:generate" is called.
     *
     * @return void
     */
    public function index()
    {
        $laravelGenerator = new AdvancedGenerator($this->getSite(), $this->configs, $this->routes);
            //new LaravelCodeGenerator($this->getSite());
        $laravelGenerator->generate();
        $laravelGenerator->generate('ShowForm');
        $laravelGenerator->generate('DisplaySingleElement');
        $laravelGenerator->generate('EditForm');
        $laravelGenerator->generate('RelatedForm');
        //$laravelGenerator->generate('Schema');
        $laravelGenerator->generate('Model');
        $laravelGenerator->generate('Controller');
        $laravelGenerator->generate('Schema');
        $laravelGenerator->generateLaravelSchemaConstraint("constraint", 'database/migrations');
        $laravelGenerator->generateLaravelSimpleFile(new SideBarTemplate);

        chmod("resources/views/master.blade.php", 0777);
    }

}