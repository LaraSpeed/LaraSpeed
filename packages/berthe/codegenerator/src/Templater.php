<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 11:40 ص
 */

namespace Berthe\Codegenerator;


abstract class Templater
{
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