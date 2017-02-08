<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 04/10/16
 * Time: 04:26 م
 *
 * This Class handle parameter necessary for generating table element forms display, We found thing like "path to resource view".
 */

namespace Berthe\Codegenerator\Templates;


class SingleDisplayTemplate extends Templater
{

    /**
     * Template Type name
     *
     * @var string
     */
    public $template = "display";

    /**
     * Path to folder where table display form view will be stored
     *
     * @var string
     */
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