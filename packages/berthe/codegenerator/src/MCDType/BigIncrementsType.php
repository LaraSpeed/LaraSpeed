<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 10:34 ص
 */

namespace Berthe\Codegenerator\MCDType;

class BigIncrementsType extends TypeBaseClass
{
    public $attrName;
    public $functionName = "bigIncrements";
    public $displayable = false;

    public function __construct($attrName = "", $required = false)
    {
        $this->attrName = $attrName;
        $this->required = $required;
    }
}