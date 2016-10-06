<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 11:28 ص
 */

namespace Berthe\Codegenerator\MCDType;

use Berthe\Codegenerator\Contrats\FormableType;
use Berthe\Codegenerator\Utils\FormTemplateProvider;


class CharType extends TypeBaseClass implements FormableType
{
    public $attrName;
    public $nb_character;
    public $formType = "text";
    public $functionName = "char";
    public $displayable = false;

    public function __construct($attrName = "", $nb_character=0)
    {
        $this->attrName = $attrName;
        $this->nb_character = $nb_character;
        if($nb_character > 1){
            $this->displayable = true;
        }
    }

    public function getDBFunction()
    {
        if($this->nb_character == 0)
            return parent::getDBFunction();

        return "$this->functionName('".$this->attrName."', $this->nb_character)";
    }

    function getFormType()
    {
        return $this->formType;
    }

    function getForm()
    {
        FormTemplateProvider::input("text", $this->attrName, "form-control", true);
    }
}