<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 12:00 م
 *
 * This Class handle parameter necessary for generating controller, We found thing like "path to controller"
 */

namespace Berthe\Codegenerator\Templates;


class ControllerTemplate extends Templater
{
    /**
     * Type of template name
     *
     * @var string
     */
    public $template = "controller";

    /**
     * Path to the controller in Laravel project
     *
     * @var string
     */
    public $outDir =  "app/Http/Controllers";

    /**
     * Get the path to the Controller file which will be created.
     * @param $tableName
     * @return string
     */
    function getPath($tableName)
    {
        return base_path($this->outDir).'/'.ucfirst($tableName).'Controller.php';
    }
}