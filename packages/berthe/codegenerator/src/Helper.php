<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 04:03 م
 */

namespace Berthe\Codegenerator;


class Helper
{
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
}