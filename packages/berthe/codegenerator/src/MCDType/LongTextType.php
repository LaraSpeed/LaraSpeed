<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 12:10 م
 */

namespace Berthe\Codegenerator\MCDType;

use Berthe\Codegenerator\Contrats\FormableType;
use Berthe\Codegenerator\Utils\FormTemplateProvider;
use Berthe\Codegenerator\Utils\Variable;

class LongTextType extends TypeBaseClass implements FormableType
{
    public $attrName;
    public $formType = "text";
    public $functionName = "longText";
    public $displayable = true;
    public $mutator = "textMutator";

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
        return FormTemplateProvider::textarea($this->attrName, 40, 10, "form-control", $value);
    }

    function formClass($type = "form"){
        if($type == "form")
            return Variable::$F_TEXT;

        return Variable::$C_TEXT;
    }

    function isText(){
        return true;
    }
}