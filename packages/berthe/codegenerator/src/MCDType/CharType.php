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
use Berthe\Codegenerator\Utils\Variable;


class CharType extends TypeBaseClass implements FormableType
{
    public $attrName;
    public $nb_character;
    public $formType = "text";
    public $functionName = "char";
    public $displayable;

    public function __construct($attrName = "", $required = false, $nb_character=0)
    {
        $this->attrName = $attrName;
        $this->nb_character = $nb_character;
        
        if($nb_character > 1){
            $this->displayable = true;
        }else{
            $this->displayable = false;
        }

        $this->required = $required;
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

    function formClass($type = "form"){
        if($type == "form")
            return Variable::$F_CHAR;

        return Variable::$C_CHAR;
    }
}