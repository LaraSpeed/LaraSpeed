<?php
/**
 * Created by PhpStorm.
 * User: minfo
 * Date: 11/03/2017
 * Time: 11:19
 */

namespace Berthe\Codegenerator\Templates;


class GenericFormTemplate  extends Templater
{
    /**
     * Template Type name
     *
     * @var string
     */
    public $template;

    /**
     * Path to form resource view folder
     *
     * @var string
     */
    public $outDir;

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
     * @param string $outDir
     */
    public function __construct($viewName = "missedView", $template = "mockup", $outDir = "resources/views")
    {
        $this->viewName = $viewName;
        $this->template = $template;
        $this->outDir = $outDir;
    }

    /**
     * Return the path to the Form file which will be generated.
     * @param string $tableName
     * @return string
     */
    function getPath($tableName = "")
    {

        return base_path($this->outDir).'/'.$this->viewName.'.php';
    }

}