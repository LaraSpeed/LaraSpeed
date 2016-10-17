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
        $toAppends = TemplateProvider::getResourceRouteTemplate($tableName, ucfirst($tableName).'Controller')."\n";
        $besideRouteRelated = TemplateProvider::getNormalRouteTemplate("get", "$tableName/related", ucfirst($tableName)."Controller@related", "/{"."$tableName}")."\n";
        $besideRouteSearch = TemplateProvider::getNormalRouteTemplate("get", "$tableName/search", ucfirst($tableName)."Controller@search")."\n";
        $content = file_get_contents(base_path('routes/').'web.php');
        //Teste if route don't already exist
        if(!str_contains($content, $besideRouteRelated)){
            FileUtils::appendString(
                $besideRouteRelated,
                base_path('routes/web.php')
            );
        }

        if(!str_contains($content, $besideRouteSearch)){
            FileUtils::appendString(
                $besideRouteSearch,
                base_path('routes/web.php')
            );
        }

        if(!str_contains($content, $toAppends)){
            FileUtils::appendString(
                $toAppends,
                base_path('routes/web.php')
            );
        }
    }
}