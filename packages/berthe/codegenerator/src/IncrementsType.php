<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 12:08 م
 */

namespace Berthe\Codegenerator;


class IncrementsType extends TypeBaseClass
{
    public $attrName;
    public $functionName = "increments";
    public $displayable = false;

    public function __construct($attrName = "")
    {
        $this->attrName = $attrName;
    }
}