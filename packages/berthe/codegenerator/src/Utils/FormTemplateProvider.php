<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 10:55 ص
 */

namespace Berthe\Codegenerator\Utils;


class FormTemplateProvider
{

    /**
     * Create Html input form based on params
     * <input type="$type" class="$class" name="$name" [placeHolder="$name"] />
     * @param string $type
     * @param string $class
     * @param string $name
     * @param bool $hasPlaceHolder
     * @return string
     */
    public static function input($type="", $name="", $class="form-control", $hasPlaceHolder = false){
        $form =  '<input type ="'.$type.'" class="'.$class.'" name="'.$name.'" ';

        if($type == "number")
            $form .= ' max = "9999999999" ';

        if($hasPlaceHolder)
            $form .= 'placeholder="'.ucfirst(str_replace("_", " ", $name)).'" ';

        return $form. ' required />';
    }

    /**
     * Create HTML Checkbox
     * @param $name
     * @return string
     */
    public static function checkBox($name){
        return self::input("checkbox", $name);
    }

    /**
     * Create HTML textarea.
     * @param string $name
     * @param int $cols
     * @param int $rows
     * @param string $class
     * @return string
     */
    public static function textarea($name="", $cols = 20, $rows = 4, $class = "form-control"){
        return '<textarea name="'.$name.'" rows="'.$rows.'" cols="'.$cols.'" class="'.$class.'" required></textarea>';
    }

    /**
     * Create HTML date fields.
     * @param $name
     * @return string
     */
    public static function date($name){
        return '<input class="form-control" id="date" name="'.$name.'" placeholder="YYY/MM/DD" type="text"/>';
    }
}