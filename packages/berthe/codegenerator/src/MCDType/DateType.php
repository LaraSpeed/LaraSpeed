<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/11/16
 * Time: 01:18 م
 */

namespace Berthe\Codegenerator\MCDType;


use Berthe\Codegenerator\Contrats\FormableType;
use Berthe\Codegenerator\Utils\FormTemplateProvider;
use Berthe\Codegenerator\Utils\Variable;

class DateType extends TypeBaseClass implements FormableType
{
    public $attrName;
    public $formType = "text";
    public $functionName = "date";
    public $displayable = true;
    public $mutator = "dateMutator";

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
        return FormTemplateProvider::date($this->attrName);
    }

    function formClass($type = "form"){
        if($type == "form")
            return Variable::$F_DATE;

        return Variable::$C_DATE;
    }

    function isDate()
    {
        return true;
    }
}