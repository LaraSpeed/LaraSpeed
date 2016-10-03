<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 09:50 ص
 */

namespace Berthe\Codegenerator;


class TypeBaseClass
{
    function getDBFunction()
    {
        return "$this->functionName('".$this->attrName."')";
    }
    

    function isDisplayable()
    {
        return $this->displayable;
    }
}