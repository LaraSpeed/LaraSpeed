<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 11:52 ص
 */

namespace Berthe\Codegenerator\MCDType;

use Berthe\Codegenerator\Contrats\FormableType;
use Berthe\Codegenerator\Utils\FormTemplateProvider;

class DecimalType extends TypeBaseClass implements FormableType
{
    public $attrName;
    public $precision;
    public $scale;
    public $formType = "number";
    public $functionName = "decimal";
    public $displayable = true;

    public function __construct($attrName = "", $precision = 0, $scale = 0)
    {
        $this->attrName = $attrName;
        $this->precision = $precision;
        $this->scale = $scale;
    }

    function getFormType()
    {
        return $this->formType;
    }

    function getForm()
    {
        return FormTemplateProvider::input($this->formType, $this->attrName, "form-control", true);
    }

    function getDBFunction()
    {
        if($this->precision == 0 and $this->scale == 0)
            return parent::getDBFunction();

        return "$this->functionName('".$this->attrName."', $this->precision, $this->scale)";
    }
}