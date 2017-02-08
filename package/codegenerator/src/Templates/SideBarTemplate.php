<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 25/10/16
 * Time: 02:26 م
 */

namespace Berthe\Codegenerator\Templates;


class SideBarTemplate extends Templater
{
    public $template = "sidebar";
    public $outDir = "resources/views";

    /**
     * Get the path to the Display file which will be created.
     * @param $tableName
     * @return string
     */
    function getPath($tableName)
    {
        return base_path($this->outDir).'/sidebar.blade.php';
    }
}