<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 12:04 م
 *
 * This Class handle parameter necessary for generating Model for the table, We found thing like "path to Model folder".
 */

namespace Berthe\Codegenerator\Templates;


class ModelTemplate extends Templater
{

    /**
     * Template type name
     *
     * @var string
     */
    public $template = "model";

    /**
     * Path to the Model view folder
     *
     * @var string
     */
    public $outDir = "app";

    /**
     * Get the path to the Model file which will be generated.
     * @param $tableName
     * @return string
     */
    function getPath($tableName)
    {
        return base_path($this->outDir).'/'.ucfirst($tableName).'.php';
    }
}