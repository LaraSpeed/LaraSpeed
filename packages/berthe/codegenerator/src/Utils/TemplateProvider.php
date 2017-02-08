<?php
namespace Berthe\Codegenerator\Utils;
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 01/09/16
 * Time: 09:22 ص
 *
 * This class is used to generate specific format of String
 */
class TemplateProvider
{
    /**
     * @var string
     */
    private static $templateBase = __dir__.'/../views/';

    /**
     *
     * Get the path to the template to use for generation (view folder)
     * @param $name
     * @return string
     */
    public static function getTemplate($name){
        return self::$templateBase."$name";
    }

    /**
     * Get the resource creation string based on parameter specified.
     *
     * @param string $route
     * @param string $controller
     * @param string $name
     * @return string
     */
    public static function getResourceRouteTemplate($route = "/", $controller = "", $name=""){
        return "Route::resource('$route', '$controller');";
    }

    /**
     * Get route string based on parameter
     *
     * @param string $routeType
     * @param string $route
     * @param string $action
     * @param string $param
     * @return string
     */
    public static function getNormalRouteTemplate($routeType = "get", $route = "/", $action = "", $param = ""){
        return "Route::$routeType('$route$param', '$action');";
    }

}