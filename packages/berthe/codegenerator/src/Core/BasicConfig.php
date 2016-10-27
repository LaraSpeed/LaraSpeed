<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 10/10/16
 * Time: 12:12 م
 */

namespace Berthe\Codegenerator\Core;


use Berthe\Codegenerator\Contrats\ConfigInterface;
use Berthe\Codegenerator\Utils\Variable;

class BasicConfig implements ConfigInterface
{
    public $configs;

    public function __construct($config = array())
    {
        $this->configs = $config;
    }

    function version()
    {
        if(array_key_exists("version", $this->configs))
            return $this->configs["version"];
        
        return Variable::$LARAVEL_VERSION_53;
    }

    function displayedAttributes($tableName = "")
    {
        if (array_key_exists("displayAttributes", $this->configs) && array_key_exists($tableName, $this->configs["displayAttributes"]))
            return $this->configs["displayAttributes"][$tableName];
        
        throw new \Exception("Displayed Attributes not shown for table : [".$tableName."]");
    }
}