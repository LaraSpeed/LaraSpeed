<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 02:57 م
 */

namespace Berthe\Codegenerator\Routess;

use Berthe\Codegenerator\Contrats\RouteManagerInterface;
use Berthe\Codegenerator\Utils\TemplateProvider;
use Berthe\Codegenerator\Utils\FileUtils;


class Laravel53Route implements RouteManagerInterface
{

    static function addResourceRoute($tableName)
    {

        //Adding Route to routes/Web.php
        $routes = array(
            //Add new Route here at the top
            //...
            TemplateProvider::getNormalRouteTemplate("get", "$tableName/related", ucfirst($tableName)."Controller@related", "/{"."$tableName}")."\n",
            TemplateProvider::getNormalRouteTemplate("get", "$tableName/search", ucfirst($tableName)."Controller@search")."\n",
            TemplateProvider::getNormalRouteTemplate("get", "$tableName/sort", ucfirst($tableName)."Controller@sort")."\n",
            TemplateProvider::getResourceRouteTemplate($tableName, ucfirst($tableName).'Controller')."\n"
        );

        $content = file_get_contents(base_path('routes/').'web.php');

        foreach ($routes as $route){
            //Teste if route don't already exist
            if(!str_contains($content, $route)){
                FileUtils::appendString(
                    $route,
                    base_path('routes/web.php')
                );
            }
        }

    }
}