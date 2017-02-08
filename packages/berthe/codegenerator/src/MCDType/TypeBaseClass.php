<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 09:50 ص
 */

namespace Berthe\Codegenerator\MCDType;


use Berthe\Codegenerator\Utils\Variable;

class TypeBaseClass
{
    /**
     * Determine whether the attribute associated to this type is required
     *
     * @var bool
     */
    public $required;

    function getDBFunction()
    {
        return "$this->functionName('".$this->attrName."')";
    }
    

    function isDisplayable()
    {
        return $this->displayable;
    }

    function isAutoIncrement(){
        return false;
    }

    function isRequired(){
        return $this->required;
    }


    function formClass($type = "form"){
        if($type == "form")
            return Variable::$F_DEFAULT;

        return Variable::$C_DEFAULT;
    }

    function isDate(){
        return false;
    }

    function mutator(){
        return $this->mutator;
    }

    function isText(){
        return false;
    }
}