<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 11:25 ص
 */

namespace Berthe\Codegenerator\MCDType;
use Berthe\Codegenerator\Contrats\FormableType;
use Berthe\Codegenerator\Utils\FormTemplateProvider;


class BooleanType extends TypeBaseClass implements FormableType
{

    public $attrName;
    public $formType = "checkbox";
    public $functionName = "boolean";
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
        return FormTemplateProvider::checkBox($this->attrName);
    }
}