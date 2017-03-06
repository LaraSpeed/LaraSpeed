<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 11:40 ص
 *
 * This Class handle parameter necessary for generating table,
 * We found in this abstract class implementation thing like "path to resource view, controller, model, schema folder ".
 */

namespace Berthe\Codegenerator\Templates;


abstract class Templater
{

    /**
     * Get the path to the folder where the template type class implementing this class will be stored.
     * @param $tableName
     * @return mixed
     */
    abstract function getPath($tableName);

    /**
     * Get the current template name.
     * @return string
     */
    function getName()
    {
        return $this->template;
    }

    /**
     * Get the Out put Directory of the template file.
     * @return string
     */
    function getOutDir()
    {
        return $this->outDir;
    }
}