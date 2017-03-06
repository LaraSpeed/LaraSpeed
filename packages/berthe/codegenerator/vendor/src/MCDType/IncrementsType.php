<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 12:08 م
 *
 * Class Defining Increments Attribute Type when Specify "Concptual Data Model"
 */

namespace Berthe\Codegenerator\MCDType;


class IncrementsType extends TypeBaseClass
{
    /**
     * The name of the attribute of this Type.
     *
     * @var string
     */
    public $attrName;

    /**
     * Equivalent function name for in Laravel (Used for Generation purpose)
     *
     * @var string
     */
    public $functionName = "increments";

    /**
     * Specify if the attributes is displayable in form
     * @var bool
     */
    public $displayable = false;

    /**
     * IncrementsType constructor.
     * @param string $attrName
     */
    public function __construct($attrName = "")
    {
        $this->attrName = $attrName;

        $this->required = true;
    }
}