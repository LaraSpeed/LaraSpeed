<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 12:04 م
 */

namespace Berthe\Codegenerator\Templates;


class ModelTemplate extends Templater
{
    public $template = "model";
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