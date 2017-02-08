<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 01:34 م
 *
 * Class Defining Set Attribute Type when Specify "Concptual Data Model"
 */

namespace Berthe\Codegenerator\MCDType;

use Berthe\Codegenerator\Utils\Helper;


class SetType extends TypeBaseClass
{

    /**
     * The name of the attribute of this Type.
     *
     * @var string
     */
    public $attrName;

    /**
     * List of element allowed by the set
     *
     * @var array
     */
    public $allowed;

    /**
     * Equivalent function name for in Laravel (Used for Generation purpose)
     *
     * @var string
     */
    public $functionName = "addColumn";

    /**
     * Specify if the attributes is displayable in form
     * @var bool
     */
    public $displayable = false;

    /**
     * SetType constructor.
     * @param string $attrName
     * @param array $allowed
     */
    public function __construct($attrName = "", $allowed = array())
    {
        $this->attrName = $attrName;
        $this->allowed = Helper::createStringArray($allowed);
    }

    /**
     * Get the necessary line of code for specifying Schema attributes for this Type
     * @return string
     */
    function getDBFunction()
    {
        return "$this->functionName('set', '".$this->attrName."', $this->allowed)";
    }
}