<?php
/**
 * Created by PhpStorm.
 * User: minfo
 * Date: 11/03/2017
 * Time: 09:58
 */

namespace Berthe\Codegenerator\Templates;


class AuthenticateTemplate extends Templater
{
    /**
     * Template Type name
     *
     * @var string
     */
    public $template = "form";

    /**
     * Path to form resource view folder
     *
     * @var string
     */
    public $outDir = "resources/views/auth";

    /**
     * Output file name
     *
     * @var string
     */
    public $viewName;

    /**
     * AuthenticateTemplate constructor.
     * @param string $viewName : View Name
     * @param string $template : Blade template to use
     */
    public function __construct($viewName = "", $template = "")
    {
        $this->viewName = $viewName;
        $this->template = $template;
    }

    /**
     * Return the path to the Form file which will be generated.
     * @param string $tableName
     * @return string
     */
    function getPath($tableName = "")
    {

        return base_path($this->outDir).'/'.$this->viewName.'.blade.php';
    }
}