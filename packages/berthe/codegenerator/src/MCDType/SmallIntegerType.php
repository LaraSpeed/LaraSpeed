<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 12:49 م
 */

namespace Berthe\Codegenerator\MCDType;


class SmallIntegerType extends TypeBaseClass
{
    public $attrName;
    public $autoIncrement;
    public $functionName = "smallInteger";
    public $displayable = false;

    public function __construct($attrName = "", $autoIncrement = false)
    {
        $this->attrName = $attrName;
        $this->autoIncrement = $autoIncrement;
    }

    function getDBFunction()
    {
        if(!$this->autoIncrement)
            return parent::getDBFunction();

        return "$this->functionName('".$this->attrName."', $this->autoIncrement)";
    }
}