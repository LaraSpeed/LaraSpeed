<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 02:57 م
 */

namespace Berthe\Codegenerator;


class Laravel53Route implements RouteManagerInterface
{

    static function addResourceRoute($tableName)
    {
        //Adding Route to routes/Web.php
        $toAppends = TemplateProvider::getResourceRouteTemplate($tableName, ucfirst($tableName).'Controller')."\n";
        $content = file_get_contents(base_path('routes/').'web.php');
        //Teste if route don't already exist
        if(!str_contains($content, $toAppends)){
            FileUtils::appendString(
                $toAppends,
                base_path('routes/web.php')
            );
        }
    }
}