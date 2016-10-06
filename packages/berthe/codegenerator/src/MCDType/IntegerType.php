<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 09:52 ص
 */

namespace Berthe\Codegenerator\MCDType;

use Berthe\Codegenerator\Contrats\FormableType;
use Berthe\Codegenerator\Utils\FormTemplateProvider;

class IntegerType extends TypeBaseClass implements FormableType
{
    public $attrName;
    public $formType = "number";
    public $functionName = "integer";
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