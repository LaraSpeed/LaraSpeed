<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 11:28 ص
 *
 * Class Defining Char Attribute Type when Specify "Concptual Data Model"
 */

namespace Berthe\Codegenerator\MCDType;

use Berthe\Codegenerator\Contrats\FormableType;
use Berthe\Codegenerator\Utils\FormTemplateProvider;
use Berthe\Codegenerator\Utils\Variable;


class CharType extends TypeBaseClass implements FormableType
{
    /**
     * The name of the attribute of this Type.
     *
     * @var string
     */
    public $attrName;

    /**
     * Number of character allowed for the Type
     * @var int
     */
    public $nb_character;

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
    public $functionName = "char";

    /**
     * Specify if the attributes is displayable in form
     * @var bool
     */
    public $displayable;

    /**
     * This Model Accessor definition view file name
     *
     * @var string
     */
    public $mutator = "charMutator";

    /**
     * CharType constructor.
     * @param string $attrName
     * @param bool $required
     * @param int $nb_character
     */
    public function __construct($attrName = "", $required = false, $nb_character=0)
    {
        $this->attrName = $attrName;
        $this->nb_character = $nb_character;
        
        if($nb_character > 1){
            $this->displayable = true;
        }else{
            $this->displayable = false;
        }

        $this->required = $required;
    }

    /**
     * Get the necessary line of code for specifying Schema attributes for this Type
     * @return string
     */
    public function getDBFunction()
    {
        if($this->nb_character == 0)
            return parent::getDBFunction();

        return "$this->functionName('".$this->attrName."', $this->nb_character)";
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
        FormTemplateProvider::input("text", $this->attrName, "form-control", $value, true);
    }

    /**
     * Get HTML "Div" tag variable Size for this Type
     *
     * @param string $type
     * @return string
     */
    function formClass($type = "form"){
        if($type == "form")
            return Variable::$F_CHAR;

        return Variable::$C_CHAR;
    }
}