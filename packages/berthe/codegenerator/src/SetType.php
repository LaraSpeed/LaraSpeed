<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 01:34 م
 */

namespace Berthe\Codegenerator;


class SetType extends TypeBaseClass
{

    public $attrName;
    public $allowed;
    public $functionName = "addColumn";
    public $displayable = false;

    public function __construct($attrName = "", $allowed = array())
    {
        $this->attrName = $attrName;
        $this->allowed = implode(",", $allowed);
    }

    function getDBFunction()
    {
        return "$this->functionName('set', ".$this->attrName."', $this->allowed)";
    }
}