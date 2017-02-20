<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 12:10 م
 *
 * Class Defining LongText Attribute Type when Specify "Concptual Data Model"
 */

namespace Berthe\Codegenerator\MCDType;

use Berthe\Codegenerator\Contrats\FormableType;
use Berthe\Codegenerator\Utils\FormTemplateProvider;
use Berthe\Codegenerator\Utils\Variable;

class LongTextType extends TypeBaseClass implements FormableType
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
    public $formType = "text";

    /**
     * Equivalent function name for in Laravel (Used for Generation purpose)
     *
     * @var string
     */
    public $functionName = "longText";

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
    public $mutator = "textMutator";

    /**
     * LongTextType constructor.
     * @param string $attrName
     * @param bool $required
     * @param bool $displayed
     * @param $unit
     */
    public function __construct($attrName = "", $required = false, $displayed = true, $unit = "")
    {
        $this->attrName = $attrName;

        $this->required = $required;

        $this->displayed = $displayed;

        $this->unit = $unit;

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
     * @param bool $editable
     * @return string
     */
    function getForm($value = "", $editable = true)
    {
        return FormTemplateProvider::textarea($this->attrName, 40, 10, "form-control", $value, $editable);
    }

    /**
     * Get HTML "Div" tag variable Size for this Type
     *
     * @param string $type
     * @return string
     */
    function formClass($type = "form"){
        if($type == "form")
            return Variable::$F_TEXT;

        return Variable::$C_TEXT;
    }

    /**
     * Test whether the current type is Text or not
     *
     * @return bool
     */
    function isText(){
        return true;
    }
}