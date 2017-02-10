<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 10/10/16
 * Time: 12:12 م
 *
 * This Class is used to managed configuration of the components, using it you can access to configuration specify in "app/in/GeneratorCode.php"
 */

namespace Berthe\Codegenerator\Core;


use Berthe\Codegenerator\Contrats\ConfigInterface;
use Berthe\Codegenerator\Utils\Variable;

class BasicConfig implements ConfigInterface
{
    /**
     * List of configuration variables
     *
     * @var array
     */
    public $configs;

    /**
     * BasicConfig constructor.
     * @param array $config
     */
    public function __construct($config = array())
    {
        $this->configs = $config;
    }

    /**
     * Get Laravel version configuration variable
     *
     * @return mixed|string
     */
    function version()
    {
        if(array_key_exists("version", $this->configs))
            return $this->configs["version"];
        
        return Variable::$LARAVEL_VERSION_53;
    }

    /**
     * Get the attributes to display for a table when we need to display only one elements (Example : title attributes for film table).
     *
     * @param string $tableName
     * @return mixed
     * @throws \Exception
     */
    function displayedAttributes($tableName = "")
    {
        if (array_key_exists("displayAttributes", $this->configs) && array_key_exists($tableName, $this->configs["displayAttributes"]))
            return $this->configs["displayAttributes"][$tableName];
        
        throw new \Exception("Displayed Attributes not shown for table : [".$tableName."]");
    }

    /**
     * Get All display Attributes
     *
     * @return mixed
     */
    function getAllDisplayedAttribute()
    {
        return $this->configs["displayAttributes"];
    }
}