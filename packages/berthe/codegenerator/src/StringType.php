<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 09:59 ص
 */

namespace Berthe\Codegenerator;


class StringType extends TypeBaseClass implements FormableType
{
    public $attrName;
    public $nb_characters;
    public $formType = "text";
    public $functionName = "string";
    public $displayable = true;

    public function __construct($attrName = "", $nb_character = 0)
    {
        $this->attrName = $attrName;
        $this->nb_characters = $nb_character;
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
}