<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 12:00 م
 */

namespace Berthe\Codegenerator;


class ControllerTemplate extends Templater
{
    public $template = "controller";
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