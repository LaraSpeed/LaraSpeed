<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 02:56 م
 */

namespace Berthe\Codegenerator\Contrats;


interface RouteManagerInterface
{
    static function addResourceRoute($tableName);
    static function addAdditionRoutes($routes);
}