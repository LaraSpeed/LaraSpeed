<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 12:44 م
 */

namespace Berthe\Codegenerator;


class EnumType extends TypeBaseClass
{
    public $attrName;
    public $elements;
    public $functionName = "enum";
    public $displayable = false;

    public function __construct($attrName = "", $elements = array ())
    {
        $this->attrName = $attrName;
        $this->elements = Helper::createStringArray($elements);
    }

    function getDBFunction()
    {
        if(count($this->elements) == 0)
            return parent::getDBFunction();

        return "$this->functionName('".$this->attrName."', $this->elements)";
    }
}