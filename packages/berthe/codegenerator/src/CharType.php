<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 11:28 ص
 */

namespace Berthe\Codegenerator;


class CharType extends TypeBaseClass
{
    public $attrName;
    public $nb_character;
    public $functionName = "char";
    public $displayable = false;

    public function __construct($attrName = "", $nb_character=0)
    {
        $this->attrName = $attrName;
        $this->nb_character = $nb_character;
    }

    public function getDBFunction()
    {
        if($this->nb_character == 0)
            return parent::getDBFunction();

        return "$this->functionName('".$this->attrName."', $this->nb_character)";
    }
}