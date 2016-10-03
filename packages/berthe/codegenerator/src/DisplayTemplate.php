<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 12:10 م
 */

namespace Berthe\Codegenerator;


class DisplayTemplate extends Templater
{
    public $template = "show";
    public $outDir = "resources/views";

    /**
     * Get the path to the Display file which will be created.
     * @param $tableName
     * @return string
     */
    function getPath($tableName)
    {
        return base_path($this->outDir).'/'.$tableName.'_show.blade.php';
    }
}