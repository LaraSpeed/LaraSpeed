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
    public $required;

    public $displayed;

    public $unit;

    /**
     * Allow the type to be list when display the table
     *
     * @param $inList bool
     */
    public function setInList($inList = true){
        $this->displayed = $inList;
    }

    /**
     * Set current type's unit
     *
     * @param string $unit
     */
    public function setUnit($unit = ""){
        $this->unit = $unit;
    }

    /**
     * Set type to be mandatory in form
     *
     * @param bool $mandatory
     */
    public function mandatory($mandatory = true){
        $this->required = $mandatory;
    }

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

    function isBoolean(){
        return false;
    }

    function isDisplayed(){
        return $this->displayed;
    }

    function hasUnit(){
        return $this->unit !== "";
    }

    public function getUnit(){
        return $this->unit;
    }
}