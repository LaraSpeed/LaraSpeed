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


class BigIntegerType extends TypeBaseClass implements FormableType
{

    public $attrName;
    public $formType = "number";
    public $functionName = "bigInteger";
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