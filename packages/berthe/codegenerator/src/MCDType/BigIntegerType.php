<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 10:47 ص
 */

namespace Berthe\Codegenerator\MCDType;

use Berthe\Codegenerator\Contrats\FormableType;
use Berthe\Codegenerator\Utils\FormTemplateProvider;
use Berthe\Codegenerator\Utils\Variable;


class BigIntegerType extends TypeBaseClass implements FormableType
{

    public $attrName;
    public $formType = "number";
    public $functionName = "bigInteger";
    public $displayable = true;
    public $mutator = "bigIntegerAccessor";

    public function __construct($attrName = "", $required = false)
    {
        $this->attrName = $attrName;
        $this->required = $required;
    }

    function getFormType()
    {
        return $this->formType;
    }

    function getForm($value = "")
    {
        return FormTemplateProvider::input($this->formType, $this->attrName, "form-control", $value, true);
    }

    function formClass($type = "form"){
        if($type == "form")
            return Variable::$F_NUMERIC;

        return Variable::$C_NUMERIC;
    }
}