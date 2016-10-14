<?php
namespace Berthe\Codegenerator\Utils;
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 01/09/16
 * Time: 09:22 ص
 */
class TemplateProvider
{
    private static $templateBase = __dir__.'/../views/';

    public static function getTemplate($name){
        return self::$templateBase."$name";
    }

    public static function getResourceRouteTemplate($route = "/", $controller = "", $name=""){
        return "Route::resource('$route', '$controller');";
    }

    public static function getNormalRouteTemplate($routeType = "get", $route = "/", $action = "", $param = ""){
        return "Route::$routeType('$route$param', '$action');";
    }

}