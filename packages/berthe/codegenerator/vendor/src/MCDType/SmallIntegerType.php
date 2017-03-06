<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 12:49 م
 *
 * Class Defining Decimal Attribute Type when Specify "Concptual Data Model"
 */

namespace Berthe\Codegenerator\MCDType;


class SmallIntegerType extends TypeBaseClass
{
    /**
     * The name of the attribute of this Type.
     *
     * @var string
     */
    public $attrName;

    /**
     * specify if SmallInteger Type is AutoIncrement or not
     * @var bool
     */
    public $autoIncrement;

    /**
     * Equivalent function name for in Laravel (Used for Generation purpose)
     *
     * @var string
     */
    public $functionName = "smallInteger";

    /**
     * Specify if the attributes is displayable in form
     * @var bool
     */
    public $displayable = false;

    /**
     * SmallIntegerType constructor.
     * @param string $attrName
     * @param bool $autoIncrement
     */
    public function __construct($attrName = "", $autoIncrement = false)
    {
        $this->attrName = $attrName;
        $this->autoIncrement = $autoIncrement;

        $this->required = true;
    }

    /**
     * Get the necessary line of code for specifying Schema attributes for this Type
     * @return string
     */
    function getDBFunction()
    {
        if(!$this->autoIncrement)
            return parent::getDBFunction();

        return "$this->functionName('".$this->attrName."', $this->autoIncrement)";
    }
}