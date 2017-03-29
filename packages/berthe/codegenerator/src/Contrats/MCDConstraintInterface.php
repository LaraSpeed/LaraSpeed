<?php
/**
 * Created by PhpStorm.
 * User: minfo
 * Date: 26/02/2017
 * Time: 15:43
 */

namespace Berthe\Codegenerator\Contrats;


interface MCDConstraintInterface
{
    function inList($inList = true);
    function mandatory($mandatory = true);
    function unit($unit = "");
    function pivot();
    function columnText($columnText = "TextUnknow");

}