<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 10/10/16
 * Time: 12:05 م
 */

namespace Berthe\Codegenerator\Routess;


use Berthe\Codegenerator\Contrats\RouteManagerInterface;
use Berthe\Codegenerator\Utils\TemplateProvider;
use Berthe\Codegenerator\Utils\FileUtils;

class Laravel512Route implements RouteManagerInterface
{

    static function addResourceRoute($tableName)
    {
        //Adding Route to routes/Web.php
        $toAppends = TemplateProvider::getResourceRouteTemplate($tableName, ucfirst($tableName).'Controller')."\n";
        $content = file_get_contents(base_path('app/Http/').'routes.php');
        //Teste if route don't already exist
        if(!str_contains($content, $toAppends)){
            FileUtils::appendString(
                $toAppends,
                base_path('app/Http/routes.php')
            );
        }
    }
}