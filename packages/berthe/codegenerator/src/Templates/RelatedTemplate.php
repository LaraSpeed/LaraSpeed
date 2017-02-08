<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 14/10/16
 * Time: 03:52 م
 *
 * This Class handle parameter necessary for generating related table element forms, We found thing like "path to resource view".
 */

namespace Berthe\Codegenerator\Templates;


class RelatedTemplate extends Templater
{

    /**
     * Template type name
     *
     * @var string
     */
    public $template = "related";

    /**
     * Path to the folder where related table form may be stored.
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
        return base_path($this->outDir).'/'.$tableName.'_related.blade.php';
    }
}