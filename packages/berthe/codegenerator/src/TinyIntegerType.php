<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 12:29 م
 */

namespace Berthe\Codegenerator;


class TinyIntegerType extends TypeBaseClass implements FormableType
{
    public $attrName;
    public $formType = "number";
    public $functionName = "tinyInteger";
    public $displayable = true;

    public function __construct($attrName = "")
    {
        $this->attrName = $attrName;
    }

    function getFormType()
    {
        return $this->formType;
    }

    function getForm()
    {
        return FormTemplateProvider::input($this->formType, $this->attrName, "form-control", true);
    }
}