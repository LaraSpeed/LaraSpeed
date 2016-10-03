<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 11:51 ص
 */

namespace Berthe\Codegenerator;


class FormTemplate extends Templater
{
    public $template = "form";
    public $outDir = "resources/views";

    /**
     * Return the path to the Form file which will be generated.
     * @param $tableName
     * @return string
     */
    function getPath($tableName)
    {
        Laravel53Route::addResourceRoute($tableName);

        return base_path($this->outDir).'/'.$tableName.'.blade.php';
    }

}