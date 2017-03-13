<?php
/**
 * Created by PhpStorm.
 * User: minfo
 * Date: 13/03/2017
 * Time: 20:40
 */

namespace Berthe\Codegenerator\Templates;


class PolicyTemplate extends Templater
{

    /**
     * Template type name
     *
     * @var string
     */
    public $template = "policy";

    /**
     * Path to the Model view folder
     *
     * @var string
     */
    public $outDir = "app/Policies";

    /**
     * Get the path to the Model file which will be generated.
     * @param $tableName
     * @return string
     */
    function getPath($tableName)
    {
        return base_path($this->outDir).'/'.ucfirst($tableName).'Policy.php';
    }

}