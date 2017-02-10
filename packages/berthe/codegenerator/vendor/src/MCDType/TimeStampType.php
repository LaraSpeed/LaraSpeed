<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 12:33 م
 *
 * Class Defining TimeStamp Attribute Type when Specify "Concptual Data Model"
 */

namespace Berthe\Codegenerator\MCDType;



class TimeStampType extends TypeBaseClass
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
    public $functionName = "timestamp";

    /**
     * Specify if the attributes is displayable in form
     * @var bool
     */
    public $displayable = false;

    /**
     * TimeStampType constructor.
     * @param string $attrName
     */
    public function __construct($attrName = "")
    {
        $this->attrName = $attrName;
    }
}