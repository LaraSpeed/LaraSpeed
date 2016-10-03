<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 03/10/16
 * Time: 10:40 ص
 */

namespace Berthe\Codegenerator;


interface FormableType
{
    function getFormType();
    function getForm();
}