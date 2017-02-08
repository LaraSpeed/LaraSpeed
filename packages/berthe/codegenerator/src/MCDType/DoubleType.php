<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 12:02 م
 *
 * Class Defining Double Attribute Type when Specify "Concptual Data Model"
 */

namespace Berthe\Codegenerator\MCDType;

use Berthe\Codegenerator\Contrats\FormableType;
use Berthe\Codegenerator\Utils\FormTemplateProvider;
use Berthe\Codegenerator\Utils\Variable;

class DoubleType extends TypeBaseClass implements FormableType
{

    /**
     * The name of the attribute of this Type.
     *
     * @var string
     */
    public $attrName;

    /**
     * Define the precision of this Decimal Type value
     *
     * @var int
     */
    public $precision;

    /**
     * Define the scale of this Decimal Type value
     *
     * @var int
     */
    public $scale;

    /**
     * Equivalent form element (Typographic "label, span, h1..." or form element "input, checkbox, ...")  (Used for Generation purpose)
     *
     * @var string
     */
    public $formType = "number";

    /**
     * Equivalent function name for in Laravel (Used for Generation purpose)
     *
     * @var string
     */
    public $functionName = "double";

    /**
     * Specify if the attributes is displayable in form
     * @var bool
     */
    public $displayable = true;

    /**
     * This Model Accessor definition view file name
     *
     * @var string
     */
    public $mutator = "doubleMutator";

    /**
     * DoubleType constructor.
     * @param string $attrName
     * @param bool $required
     * @param int $precision
     * @param int $scale
     */
    public function __construct($attrName = "", $required = false, $precision = 0, $scale = 0)
    {
        $this->attrName = $attrName;
        $this->precision = $precision;
        $this->scale = $scale;

        $this->required = $required;
    }

    /**
     * Return the type for form (Typographic "label, span, h1..." or form element "input, checkbox, ...")
     *
     * @return string
     */
    function getFormType()
    {
        return $this->formType;
    }

    /**
     * Get HTML Code associated with the Type
     *
     * @param string $value
     * @return string
     */
    function getForm($value = "")
    {
        return FormTemplateProvider::input($this->formType, $this->attrName, "form-control", $value, true);
    }

    /**
     * Get the necessary line of code for specifying Schema attributes for this Type
     * @return string
     */
    function getDBFunction()
    {
        if($this->precision == 0 and $this->scale == 0)
            return parent::getDBFunction();

        return "$this->functionName('".$this->attrName."', $this->precision, $this->scale)";
    }

    /**
     * Get HTML "Div" tag variable Size for this Type
     *
     * @param string $type
     * @return string
     */
    function formClass($type = "form"){
        if($type == "form")
            return Variable::$F_NUMERIC;

        return Variable::$C_NUMERIC;
    }
}