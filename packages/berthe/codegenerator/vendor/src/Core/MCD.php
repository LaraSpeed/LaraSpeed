<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/09/16
 * Time: 04:04 م
 */

namespace Berthe\Codegenerator\Core;

use Berthe\Codegenerator\MCDType\BigIncrementsType;
use Berthe\Codegenerator\MCDType\BigIntegerType;
use Berthe\Codegenerator\MCDType\BooleanType;
use Berthe\Codegenerator\MCDType\CharType;
use Berthe\Codegenerator\MCDType\DateType;
use Berthe\Codegenerator\MCDType\DecimalType;
use Berthe\Codegenerator\MCDType\DoubleType;
use Berthe\Codegenerator\MCDType\EnumType;
use Berthe\Codegenerator\MCDType\FloatType;
use Berthe\Codegenerator\MCDType\IncrementsType;
use Berthe\Codegenerator\MCDType\IntegerType;
use Berthe\Codegenerator\MCDType\LongTextType;
use Berthe\Codegenerator\MCDType\SetType;
use Berthe\Codegenerator\MCDType\SmallIntegerType;
use Berthe\Codegenerator\MCDType\StringType;
use Berthe\Codegenerator\MCDType\TextType;
use Berthe\Codegenerator\MCDType\TinyIntegerType;
use Berthe\Codegenerator\MCDType\TimeStampType;
use Berthe\Codegenerator\Relation\BelongsToManyRelation;
use Berthe\Codegenerator\Relation\BelongsToRelation;
use Berthe\Codegenerator\Relation\HasManyRelation;
use Berthe\Codegenerator\Relation\HasOneRelation;


class MCD
{
    /**
     * Tables informations and relation
     *
     * @var array
     */
    private $tables;

    /**
     * Current table name (when you write $mcd->table("....") => the name of the table will be store in this variable)
     *
     * @var string
     */
    private $currentTableName;

    /**
     * List of attributes for the current table (table which name is in $currentTable attributes)
     *
     * @var array
     */
    private $currentAttributes;

    /**
     * List of relation for the current table (table which name is in $currentTable attributes)
     *
     * @var array
     */
    private $currentRelations;

    /**
     *
     * Track the end of a single table definition
     * @var bool
     */
    private $isEnded;

    /**
     * Track whether current table has an ID setUp
     *
     * @var bool
     */
    private $hasId = false;

    /**
     * List of Additional Routes for tables relations
     *
     * @var array
     */
    private $routes;

    /**
     * MCD constructor.
     */
    public function __construct()
    {
        $this->tables = array();

        $this->routes = array();

        $this->init();
    }

    /**
     * Init Attributes for a new table definition
     */
    private function init(){
        $this->currentTableName = "table";
        $this->currentAttributes = array();
        $this->currentRelations = array();
        $this->isEnded = false;
        $this->hasId = false;
    }

    /**
     * Set an Id for the current table
     *
     * @param $id int
     */
    private function setTableID($id)
    {
        if (!$this->hasId) {
            $this->tables[$this->currentTableName]['id'] = $id;
            $this->hasId = true;
        }
    }

    /**
     * Get Additional routes to add for tables relations
     * @return array
     */
    public function getRoutes(){
        return $this->routes;
    }
    

    /**
     * Function initializing adding table.
     * @param string $tableName
     * @return $this
     */
    public function table($tableName = "table"){
        $this->tables[$tableName] = array();
        $this->currentTableName = $tableName;
        $this->tables[$this->currentTableName]['relations'] = array();

        //$this->routes[$this->currentTableName."/clearSearch"] = ucfirst($this->currentTableName)."Controller@clearSearch";

        return $this;
    }

    /**
     * Function adding new string attribut to the current Attribute Array.
     * @param string $attrName
     * @param bool $required
     * @param int $nb_characters
     * @return $this
     */
    public function string($attrName = "string", $required = false, $nb_characters = 0){
        $this->currentAttributes[$attrName] = new StringType($attrName, $required, $nb_characters);
        return $this;
    }

    /**
     * Function adding new integer attribute
     * @param string $attrName
     * @param bool $required
     * @return $this
     */
    public function integer($attrName="integer", $required = false){
        $this->currentAttributes[$attrName] = new IntegerType($attrName, $required);
        return $this;
    }

    /**
     * @param string $attrName
     * @return $this
     */
    public function bigIncrements($attrName="biginc"){
        $this->currentAttributes[$attrName] = new BigIncrementsType($attrName);

        //Create an ID for the current Table if not exist
        $this->setTableID($attrName);

        return $this;
    }

    /**
     * @param string $attrName
     * @param bool $required
     * @return $this
     */
    public function bigInteger($attrName = "bigint", $required = false){
        $this->currentAttributes[$attrName] = new BigIntegerType($attrName, $required);
        return $this;
    }

    /**
     * @param string $attrName
     * @param bool $required
     * @return $this
     */
    public function boolean($attrName = "bool", $required = false){
        $this->currentAttributes[$attrName] = new BooleanType($attrName, $required);
        return $this;
    }

    /**
     * @param string $attrName
     * @param $required
     * @param int $nb_character
     * @return $this
     */
    public function char($attrName= "char", $required = false, $nb_character = 0){
        $this->currentAttributes[$attrName] = new CharType($attrName, $required, $nb_character);
        return $this;
    }

    /**
     * @param string $attrName
     * @param bool $required
     * @param int $precision
     * @param int $scale
     * @return $this
     */
    public function decimal($attrName = "decimal", $required = false, $precision = 0, $scale = 0){
        $this->currentAttributes[$attrName] = new DecimalType($attrName, $required, $precision, $scale);
        return $this;
    }

    /**
     * @param string $attrName
     * @param bool $required
     * @param int $digit
     * @param int $after
     * @return $this
     */
    public function double($attrName = "double", $required = false, $digit = 0, $after = 0){
        $this->currentAttributes[$attrName] = new DoubleType($attrName, $required, $digit, $after);
        return $this;
    }

    /**
     * @param string $attrName
     * @param array $elements
     * @return $this
     */
    public function enum($attrName = "enum", $elements = array()){
        $this->currentAttributes[$attrName] = new EnumType($attrName,$elements);
        return $this;
    }

    /**
     * @param string $attrName
     * @param bool $required
     * @param $precision
     * @param $scale
     * @return $this
     */
    public function float($attrName = "float", $required = false, $precision, $scale){
        $this->currentAttributes[$attrName] = new FloatType($attrName, $required, $precision, $scale);
        return $this;
    }

    /**
     * @param string $attrName
     * @return $this
     */
    public function increments($attrName = "inc"){
        $this->currentAttributes[$attrName] = new IncrementsType($attrName);

        //Create an ID for the current Table if not exist
        $this->setTableID($attrName);

        return $this;
    }

    /**
     * @param string $attrName
     * @param bool $required
     * @return $this
     */
    public function longText($attrName = "longtext", $required = false){
        $this->currentAttributes[$attrName] = new LongTextType($attrName, $required);
        return $this;
    }

    /**
     * @param string $attrName
     * @param bool $autoIncrements
     * @return $this
     */
    public function smallInteger($attrName = "smallint", $autoIncrements = false){
        $this->currentAttributes[$attrName] = new SmallIntegerType($attrName, $autoIncrements);

        //Create an ID for the current Table if not exist
        $this->setTableID($attrName);

        return $this;
    }

    /**
     * @param string $attrName
     * @return $this
     */
    public function text($attrName = "text", $required = false){
        $this->currentAttributes[$attrName] = new TextType($attrName, $required);
        return $this;
    }

    /**
     * @param string $attrName
     * @return $this
     */
    public function timeStamp($attrName = "timestamps"){
        $this->currentAttributes[$attrName] = new TimeStampType($attrName);
        return $this;
    }

    /**
     * @param string $attrName
     * @return $this
     */
    public function tinyInteger($attrName = "tinyInteger"){
        $this->currentAttributes[$attrName] = new TinyIntegerType($attrName);

        //Create an ID for the current Table if not exist
        $this->setTableID($attrName);

        return $this;
    }

    /**
     * @param string $attrName
     * @param array $allowed
     * @return $this
     */
    public function set($attrName = "set", $allowed = array()){
        $this->currentAttributes[$attrName] = new SetType($attrName, $allowed);
        return $this;
    }

    /**
     * @param string $attrName
     * @param bool $required
     * @return $this
     */
    public function date($attrName = "date", $required = false){
        $this->currentAttributes[$attrName] = new DateType($attrName, $required);
        return $this;
    }

    /**
     * Function adding new relation hasOne Type of relation to the list of the current table relations
     * @param string $tableName
     * @return $this
     */
    public function hasOne($tableName="table"){
        $this->tables[$this->currentTableName]['relations'][] = new HasOneRelation($this->currentTableName, $tableName);

        //Adding Additional Route
        $this->routes[$this->currentTableName."/update".ucfirst($tableName)."/{"."$this->currentTableName}"] = ucfirst($this->currentTableName)."Controller@update".ucfirst($tableName);

        return $this;
    }

    /**
     * Function adding new relation hasMany Type of relation to the list of the current table relations
     * @param string $tableName
     * @return $this
     */
    public function hasMany($tableName="table"){
        $this->tables[$this->currentTableName]['relations'][] = new HasManyRelation($this->currentTableName, $tableName);

        //Adding Additional Route
        $this->routes[$this->currentTableName."/add".ucfirst($tableName)."/{"."$this->currentTableName}"] = ucfirst($this->currentTableName)."Controller@add".ucfirst($tableName);
        
        return $this;
    }

    /**
     * Function adding new relation belongsTo Type of relation to the list of the current table relations
     * @param string $tableName
     * @return $this
     */
    public function belongsTo($tableName ="table"){
        $this->tables[$this->currentTableName]['relations'][] = new BelongsToRelation($this->currentTableName, $tableName);

        //Adding Additional Route
        $this->routes[$this->currentTableName."/update".ucfirst($tableName)."/{"."$this->currentTableName}"] = ucfirst($this->currentTableName)."Controller@update".ucfirst($tableName);

        return $this;
    }

    /**
     * Function adding new relation belongsToMany Type of relation to the list of the current table relations
     * @param string $tableName
     * @return $this
     */
    public function belongsToMany($tableName ="table"){
        $this->tables[$this->currentTableName]['relations'][] = new BelongsToManyRelation($this->currentTableName, $tableName);

        //Adding Additional Route
        $this->routes[$this->currentTableName."/add".ucfirst($tableName)."/{"."$this->currentTableName}"] = ucfirst($this->currentTableName)."Controller@add".ucfirst($tableName);


        return $this;
    }

    /**
     * Function committing add new Table to the MCD.
     * @return $this
     */
    public function end(){
        $this->tables[$this->currentTableName]['attributs'] = $this->currentAttributes;
        //$this->tables[$this->currentTableName]['relations'] = $this->currentRelations;
        $this->init();
        return $this;
    }

    /**
     * Get the Conceptual Data Model as an array
     *
     * @return array
     */
    public function getSite(){
        return $this->tables;
    }

}