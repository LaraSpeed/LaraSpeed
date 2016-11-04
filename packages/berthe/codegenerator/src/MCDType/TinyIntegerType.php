<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 12:29 م
 */

namespace Berthe\Codegenerator\MCDType;

use Berthe\Codegenerator\Contrats\FormableType;
use Berthe\Codegenerator\Utils\FormTemplateProvider;
use Berthe\Codegenerator\Utils\Variable;

class TinyIntegerType extends TypeBaseClass implements FormableType
{
    public $attrName;
    public $formType = "number";
    public $functionName = "tinyInteger";
    public $displayable = true;
    public $mutator = "tinyIntegerMutator";

    public function __construct($attrName = "")
    {
        $this->attrName = $attrName;
        $this->required = true;
    }

    function getFormType()
    {
        return $this->formType;
    }

    function getForm()
    {
        return FormTemplateProvider::input($this->formType, $this->attrName, "form-control", true);
    }

    function formClass($type = "form"){
        if($type == "form")
            return Variable::$F_NUMERIC;

        return Variable::$C_NUMERIC;
    }
}