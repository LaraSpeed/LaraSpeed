<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 12:33 م
 */

namespace Berthe\Codegenerator\MCDType;



class TimeStampType extends TypeBaseClass
{
    public $attrName;
    public $functionName = "timestamp";
    public $displayable = false;

    public function __construct($attrName = "")
    {
        $this->attrName = $attrName;
    }
}