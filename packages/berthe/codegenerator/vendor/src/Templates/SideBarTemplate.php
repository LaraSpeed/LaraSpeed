<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 25/10/16
 * Time: 02:26 م
 *
 * This Class handle parameter necessary for generating SideBar , We found thing like "path to resource view".
 */

namespace Berthe\Codegenerator\Templates;


class SideBarTemplate extends Templater
{
    /**
     * Template type name
     *
     * @var string
     */
    public $template = "sidebar";

    /**
     * Path to the folder where sidebar view will be stored
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
        return base_path($this->outDir).'/sidebar.blade.php';
    }
}