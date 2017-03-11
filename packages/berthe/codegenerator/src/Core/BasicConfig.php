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
use League\Flysystem\Exception;

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

    /**
     * Get a table's icon to display in the SideBar
     *
     * @param string $tableName
     * @return stringss
     */
    function getTableIcon($tableName = ""){
        return $this->proccess("sidebarIcons", $tableName);
    }

    /**
     * Get the plurial form of a given table
     *
     * @param string $tableName
     * @return string
     */
    function getPluralForm($tableName = "")
    {
        return $this->proccess("tablePluralForm", $tableName);
    }

    /**
     * Test whether the given tableName is pivots table or not
     *
     * @param string $tableName
     * @return bool
     */
    function isPivot($tableName = "")
    {
        return in_array($tableName, $this->configs["pivots"]);
    }

    /**
     * Get related table hover message
     *
     * @param string $tableName
     * @param string $relatedTableName
     * @return mixed
     */
    function getHoverMessage($tableName = "", $relatedTableName = "")
    {
        return $this->proccess("hoverMessages", $tableName . $relatedTableName);
    }

    /**
     * Get ACL config
     *
     * @return mixed|null
     */
    public function getACL(){
        return array_key_exists("acl", $this->configs) ? $this->configs["acl"] : null;
    }

    /**
     * get configuration data
     *
     * @param $key
     * @param string $tableName
     * @return mixed
     * @throws \Exception
     */
    private function proccess($key = "", $tableName = ""){
        if (array_key_exists($key, $this->configs) && array_key_exists($tableName, $this->configs[$key]))
            return $this->configs[$key][$tableName];

        throw new \Exception($key." form specified for table : [".$tableName."]");
    }
}