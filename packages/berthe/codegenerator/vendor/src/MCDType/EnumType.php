<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 12:44 م
 *
 * Class Defining Enum Attribute Type when Specify "Concptual Data Model"
 */

namespace Berthe\Codegenerator\MCDType;

use Berthe\Codegenerator\Utils\Helper;

class EnumType extends TypeBaseClass
{

    /**
     * The name of the attribute of this Type.
     *
     * @var string
     */
    public $attrName;

    /**
     * List of elements in enumeration
     *
     * @var array
     */
    public $elements;

    /**
     * Equivalent function name for in Laravel (Used for Generation purpose)
     *
     * @var string
     */
    public $functionName = "enum";

    /**
     * Specify if the attributes is displayable in form
     * @var bool
     */
    public $displayable = false;

    /**
     * EnumType constructor.
     * @param string $attrName
     * @param array $elements
     */
    public function __construct($attrName = "", $elements = array ())
    {
        $this->attrName = $attrName;
        $this->elements = Helper::createStringArray($elements);
    }

    /**
     * Get the necessary line of code for specifying Schema attributes for this Type
     * @return string
     */
    function getDBFunction()
    {
        if(count($this->elements) == 0)
            return parent::getDBFunction();

        return "$this->functionName('".$this->attrName."', $this->elements)";
    }
}