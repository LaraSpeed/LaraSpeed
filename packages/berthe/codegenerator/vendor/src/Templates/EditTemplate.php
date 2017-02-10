<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 11/10/16
 * Time: 12:23 م
 *
 * This Class handle parameter necessary for generating Edit table element forms, We found thing like "path to resource view".
 */

namespace Berthe\Codegenerator\Templates;


class EditTemplate extends Templater
{
    /**
     * Type of template name
     *
     * @var string
     */
    public $template = "edit";

    /**
     * Path to Edit resource view folder
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
        return base_path($this->outDir).'/'.$tableName.'_edit.blade.php';
    }
}