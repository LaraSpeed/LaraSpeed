<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 12:10 م
 */

namespace Berthe\Codegenerator;


class LongTextType extends TypeBaseClass implements FormableType
{
    public $attrName;
    public $formType = "text";
    public $functionName = "longText";
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
        return FormTemplateProvider::textarea($this->attrName, 40, 10);
    }
}