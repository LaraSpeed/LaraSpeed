<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 14/10/16
 * Time: 03:52 م
 */

namespace Berthe\Codegenerator\Templates;


class RelatedTemplate extends Templater
{
    public $template = "related";
    public $outDir = "resources/views";

    /**
     * Get the path to the Display file which will be created.
     * @param $tableName
     * @return string
     */
    function getPath($tableName)
    {
        return base_path($this->outDir).'/'.$tableName.'_related.blade.php';
    }
}