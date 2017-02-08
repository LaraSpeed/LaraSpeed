<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 01/09/16
 * Time: 05:40 م
 */

namespace Berthe\Codegenerator\Core;
use Berthe\Codegenerator\Core\AdvancedGenerator;
use Berthe\Codegenerator\Templates\SideBarTemplate;

class CallGenerator
{
    public $routes;

    public function getSite(){
        return array();
    }

    public function setRoutes($routes = array()){
        $this->routes = $routes;
    }

    public function index()
    {
        $laravelGenerator = new AdvancedGenerator($this->getSite(), $this->configs, $this->routes);
            //new LaravelCodeGenerator($this->getSite());
        $laravelGenerator->generate();
        $laravelGenerator->generate('ShowForm');
        $laravelGenerator->generate('DisplaySingleElement');
        $laravelGenerator->generate('EditForm');
        $laravelGenerator->generate('RelatedForm');
        $laravelGenerator->generate('Schema');
        $laravelGenerator->generate('Model');
        $laravelGenerator->generate('Controller');
        $laravelGenerator->generate('Schema');
        $laravelGenerator->generateLaravelSchemaConstraint("constraint", 'database/migrations');
        $laravelGenerator->generateLaravelSimpleFile(new SideBarTemplate);

        chmod("resources/views/master.blade.php", 0777);
    }

}