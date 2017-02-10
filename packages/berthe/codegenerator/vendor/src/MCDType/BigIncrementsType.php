<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 10:34 ص
 *
 * Class Defining BigIncrement Attribute Type when Specify "Concptual Data Model"
 */

namespace Berthe\Codegenerator\MCDType;

class BigIncrementsType extends TypeBaseClass
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
    public $functionName = "bigIncrements";

    /**
     * Specify if the attributes is displayable in form
     * @var bool
     */
    public $displayable = false;

    /**
     * BigIncrementsType constructor.
     * @param string $attrName
     * @param bool $required
     */
    public function __construct($attrName = "", $required = false)
    {
        $this->attrName = $attrName;
        $this->required = $required;
    }
}