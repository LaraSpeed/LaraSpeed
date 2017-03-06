<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/11/16
 * Time: 01:18 م
 *
 * Class Defining Date Attribute Type when Specify "Concptual Data Model"
 */

namespace Berthe\Codegenerator\MCDType;


use Berthe\Codegenerator\Contrats\FormableType;
use Berthe\Codegenerator\Utils\FormTemplateProvider;
use Berthe\Codegenerator\Utils\Variable;

class DateType extends TypeBaseClass implements FormableType
{
    /**
     * The name of the attribute of this Type.
     *
     * @var string
     */
    public $attrName;

    /**
     * Equivalent form element (Typographic "label, span, h1..." or form element "input, checkbox, text...")  (Used for Generation purpose)
     *
     * @var string
     */
    public $formType = "text";

    /**
     * Equivalent function name for in Laravel (Used for Generation purpose)
     *
     * @var string
     */
    public $functionName = "date";

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
    public $mutator = "dateMutator";

    /**
     * DateType constructor.
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
        return FormTemplateProvider::date($this->attrName, $value);
    }

    /**
     * Get HTML "Div" tag variable Size for this Type
     *
     * @param string $type
     * @return string
     */
    function formClass($type = "form"){
        if($type == "form")
            return Variable::$F_DATE;

        return Variable::$C_DATE;
    }

    /**
     * Test if the current type is date of not
     *
     * @return bool
     */
    function isDate()
    {
        return true;
    }
}