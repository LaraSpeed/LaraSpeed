<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 11:51 ص
 */

namespace Berthe\Codegenerator\Templates;

use Berthe\Codegenerator\Core\BasicConfig;
use Berthe\Codegenerator\Routess\Laravel512Route;
use Berthe\CodeGenerator\Routess\Laravel53Route;
use Berthe\Codegenerator\Utils\Variable;

class FormTemplate extends Templater
{
    public $template = "form";
    public $outDir = "resources/views";
    public $version;
    public $routes;

    public function __construct($version = "", $routes = array())
    {
        $this->version = $version;
        $this->routes = $routes;
    }

    /**
     * Return the path to the Form file which will be generated.
     * @param $tableName
     * @return string
     */
    function getPath($tableName)
    {
        //Laravel53Route::addResourceRoute($tableName);
        if ($this->version == Variable::$LARAVEL_VERSION_53) {
            Laravel53Route::addAdditionRoutes($this->routes);
            Laravel53Route::addResourceRoute($tableName);
        } elseif (($this->version == Variable::$LARAVEL_VERSION_51) or ($this->version == Variable::$LARAVEL_VERSION_52)) {
            Laravel512Route::addAdditionRoutes($this->routes);
            Laravel512Route::addResourceRoute($tableName);
        }

        return base_path($this->outDir).'/'.$tableName.'.blade.php';
    }

}