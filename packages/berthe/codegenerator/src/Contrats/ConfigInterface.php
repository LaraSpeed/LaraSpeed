<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 10/10/16
 * Time: 12:01 م
 */

namespace Berthe\Codegenerator\Contrats;


interface ConfigInterface
{
    function version();
    function displayedAttributes($tableName="");
}