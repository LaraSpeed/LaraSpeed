<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 09:59 ص
 *
 * Class Defining String Attribute Type when Specify "Concptual Data Model"
 */

namespace Berthe\Codegenerator\MCDType;

use Berthe\Codegenerator\Contrats\FormableType;
use Berthe\Codegenerator\Utils\FormTemplateProvider;
use Berthe\Codegenerator\Utils\Variable;

class StringType extends TypeBaseClass implements FormableType
{

    /**
     * The name of the attribute of this Type.
     *
     * @var string
     */
    public $attrName;

    /**
     * Nummber of character in the String Type
     *
     * @var int
     */
    public $nb_characters;

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
    public $functionName = "string";

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
     * StringType constructor.
     * @param string $attrName
     * @param bool $required
     * @param int $nb_character
     */
    public function __construct($attrName = "", $required = false, $nb_character = 0)
    {
        $this->attrName = $attrName;
        $this->nb_characters = $nb_character;

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
        if($this->nb_characters == 0)
            return parent::getDBFunction();

        return "$this->functionName('".$this->attrName."', $this->nb_characters)";
    }

    /**
     * Get HTML "Div" tag variable Size for this Type
     *
     * @param string $type
     * @return string
     */
    function formClass($type = "form"){
        if($type == "form")
            return Variable::$F_STRING;

        return Variable::$C_STRING;
    }

    /**
     * Test whether the current Type is Text or not
     *
     * @return bool
     */
    function isText(){
        return true;
    }
}