<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 11:51 ص
 *
 * This Class handle parameter necessary for generating insertion forms, We found thing like "path to resource view".
 */

namespace Berthe\Codegenerator\Templates;

use Berthe\Codegenerator\Core\BasicConfig;
use Berthe\Codegenerator\Routess\Laravel512Route;
use Berthe\CodeGenerator\Routess\Laravel53Route;
use Berthe\Codegenerator\Utils\Variable;

class FormTemplate extends Templater
{
    /**
     * Template Type name
     *
     * @var string
     */
    public $template = "form";

    /**
     * Path to form resource view folder
     *
     * @var string
     */
    public $outDir = "resources/views";

    /**
     * Laravel version
     *
     * @var string
     */
    public $version;

    /**
     * Additional route to add for the table
     *
     * @var array
     */
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