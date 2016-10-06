<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 04/10/16
 * Time: 04:26 م
 */

namespace Berthe\Codegenerator\Templates;


class SingleDisplayTemplate extends Templater
{

    public $template = "display";
    public $outDir = "resources/views";

    /**
     * Get the path to the Display file which will be created.
     * @param $tableName
     * @return string
     */
    function getPath($tableName)
    {
        return base_path($this->outDir).'/'.$tableName.'_display.blade.php';
    }
}