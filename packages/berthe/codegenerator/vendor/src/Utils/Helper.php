<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 04:03 م
 *
 * This class is a simple Helper class used to perform simple operation like "Camel Case String"....
 */

namespace Berthe\Codegenerator\Utils;


class Helper
{
    /**
     * Create String containing array definition (Something like : "[.....]")
     *
     * @param $array
     * @return string
     */
    public static function createStringArray($array){
        $str = "array(";
        $i = 0;
        foreach ($array as $elt){
            if($i == 0)
                $str .= "\"$elt\",";
            else
                $str .= ",\"$elt\"";
        }
        return $str.")";
    }

    /**
     * Camel case an given String with dashes
     * @param $string
     * @param bool $capitalizeFirstCharacter : whether to capitalize first letter.
     * @return mixed
     */
    public static function dashesToCamelCase($string, $capitalizeFirstCharacter = false)
    {

        $str = str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));

        if (!$capitalizeFirstCharacter) {
            $str[0] = lcfirst($str[0]);
        }

        return $str;
    }

    /**
     * Camelize a giviing words.
     * @param $input
     * @param string $separator
     * @return mixed
     */
    public static function camelize($input, $separator = '_')
    {
        return str_replace($separator, '', ucwords($input, $separator));
    }
}