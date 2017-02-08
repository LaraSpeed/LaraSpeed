<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 10/10/16
 * Time: 12:01 م
 *
 * This is a contract to respect when you want to handle LaraSpeed configuration
 */

namespace Berthe\Codegenerator\Contrats;


interface ConfigInterface
{
    function version();
    function displayedAttributes($tableName="");
    function getAllDisplayedAttribute();
}