<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 01/09/16
 * Time: 05:40 م
 */

namespace Berthe\Codegenerator\Core;
//use Berthe\Codegenerator\Core\LaravelCodeGenerator;
use Berthe\Codegenerator\Core\AdvancedGenerator;

class CallGenerator
{
    public function getSite(){
        return array();
    }

    public function index()
    {
        $laravelGenerator = new AdvancedGenerator($this->getSite(), $this->configs);
            //new LaravelCodeGenerator($this->getSite());
        $laravelGenerator->generate();
        $laravelGenerator->generate('ShowForm');
        $laravelGenerator->generate('DisplaySingleElement');
        $laravelGenerator->generate('Schema');
        $laravelGenerator->generate('Model');
        $laravelGenerator->generate('Controller');
        $laravelGenerator->generate('Schema');
        $laravelGenerator->generateLaravelSchemaConstraint("constraint", 'database/migrations');

        chmod("resources/views/master.blade.php", 0777);
    }

}