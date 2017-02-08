<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 09:52 ص
 *
 * Class Defining Integer Attribute Type when Specify "Concptual Data Model"
 */

namespace Berthe\Codegenerator\MCDType;

use Berthe\Codegenerator\Contrats\FormableType;
use Berthe\Codegenerator\Utils\FormTemplateProvider;
use Berthe\Codegenerator\Utils\Variable;

class IntegerType extends TypeBaseClass implements FormableType
{

    /**
     * The name of the attribute of this Type.
     *
     * @var string
     */
    public $attrName;

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
    public $functionName = "integer";

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
    public $mutator = "integerMutator";

    /**
     * IntegerType constructor.
     * @param string $attrName
     * @param bool $required
     */
    public function __construct($attrName = "", $required = false)
    {
        $this->attrName = $attrName;

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