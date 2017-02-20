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
use Berthe\Codegenerator\Utils\Variable;


class BooleanType extends TypeBaseClass implements FormableType
{

    public $attrName;
    public $formType = "checkbox";
    public $functionName = "boolean";
    public $displayable = true;
    public $mutator = "booleanMutator";

    public function __construct($attrName = "", $required = false, $displayed = true, $unit = "")
    {
        $this->attrName = $attrName;
        $this->required = $required;
        $this->displayed = $displayed;
        $this->unit = $unit;
    }

    function getFormType()
    {
        return $this->formType;
    }

    function getForm($value = "", $editable = true)
    {
        return FormTemplateProvider::checkBox($this->attrName, $value);
    }

    function formClass($type = "form"){
        if($type == "form")
            return Variable::$F_NUMERIC;

        return Variable::$C_NUMERIC;
    }

    function isBoolean(){
        return true;
    }
}