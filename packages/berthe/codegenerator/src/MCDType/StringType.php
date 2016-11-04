<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 09:59 ص
 */

namespace Berthe\Codegenerator\MCDType;

use Berthe\Codegenerator\Contrats\FormableType;
use Berthe\Codegenerator\Utils\FormTemplateProvider;
use Berthe\Codegenerator\Utils\Variable;

class StringType extends TypeBaseClass implements FormableType
{
    public $attrName;
    public $nb_characters;
    public $formType = "text";
    public $functionName = "string";
    public $displayable = true;
    public $mutator = "textMutator";

    public function __construct($attrName = "", $required = false, $nb_character = 0)
    {
        $this->attrName = $attrName;
        $this->nb_characters = $nb_character;

        $this->required = $required;
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
        if($this->nb_characters == 0)
            return parent::getDBFunction();

        return "$this->functionName('".$this->attrName."', $this->nb_characters)";
    }

    function formClass($type = "form"){
        if($type == "form")
            return Variable::$F_STRING;

        return Variable::$C_STRING;
    }

    function isText(){
        return true;
    }
}