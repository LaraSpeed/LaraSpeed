<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 11/10/16
 * Time: 12:23 م
 */

namespace Berthe\Codegenerator\Templates;


class EditTemplate extends Templater
{
    public $template = "edit";
    public $outDir = "resources/views";

    /**
     * Get the path to the Display file which will be created.
     * @param $tableName
     * @return string
     */
    function getPath($tableName)
    {
        return base_path($this->outDir).'/'.$tableName.'_edit.blade.php';
    }
}