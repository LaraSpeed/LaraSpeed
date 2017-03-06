<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 12:10 م
 *
 * This Class handle parameter necessary for generating display forms, We found thing like "path to resource view".
 */

namespace Berthe\Codegenerator\Templates;


class DisplayTemplate extends Templater
{
    /**
     * Type of template name
     *
     * @var string
     */
    public $template = "show";

    /**
     * Path to the "resource view folder" in Laravel project
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
        return base_path($this->outDir).'/'.$tableName.'_show.blade.php';
    }
}