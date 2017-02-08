<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 10:55 ص
 *
 * This Class is used to create HTML elements using function.
 */

namespace Berthe\Codegenerator\Utils;


class FormTemplateProvider
{

    /**
     * Create Html input form based on params
     * <input type="$type" class="$class" name="$name" [placeHolder="$name"] />
     * @param string $type
     * @param string $class
     * @param string $value
     * @param string $name
     * @param bool $hasPlaceHolder
     * @return string
     */
    public static function input($type="", $name="", $class="form-control", $value = "", $hasPlaceHolder = false){
        $form =  '<input type ="'.$type.'" class="'.$class.'" name="'.$name.'" ';

        if($type == "number")
            $form .= ' data-plugin-maxlength="" maxlength="10"';

        if($value != "") {
            if ($type == "checkbox")
                $form .=' checked ';
            else
                $form .= 'value = "' . $value . '"';
        }

        if($hasPlaceHolder)
            $form .= 'placeholder="'.ucfirst(str_replace("_", " ", $name)).'" ';

        return $form. ' required />';
    }

    /**
     * Create HTML Checkbox
     * @param $name
     * @param $isChecked
     * @return string
     */
    public static function checkBox($name, $isChecked = ""){
        return self::input("checkbox", $name, "form-control", $isChecked);
    }

    /**
     * Create HTML textarea.
     * @param string $name
     * @param int $cols
     * @param int $rows
     * @param string $class
     * @param string $value
     * @return string
     */
    public static function textarea($name="", $cols = 20, $rows = 4, $class = "form-control", $value = ""){
        if($value != "")
            return '<textarea name="'.$name.'" rows="'.$rows.'" cols="'.$cols.'" class="'.$class.'" required>'.$value.'</textarea>';
        return '<textarea name="'.$name.'" rows="'.$rows.'" cols="'.$cols.'" class="'.$class.'" required></textarea>';
    }

    /**
     * Create HTML date fields.
     * @param $name
     * @return string
     */
    public static function date($name, $value=""){
        if($value !== "")
            return '<div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" id="date" data-plugin-datepicker="" name="'.$name.'" value="'.$value.'" placeholder="MM/DD/-YYYY" type="text"/></div>';

        return '<div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" id="date" data-plugin-datepicker="" name="'.$name.'" placeholder="MM/DD/-YYYY" type="text"/></div>';
    }
}