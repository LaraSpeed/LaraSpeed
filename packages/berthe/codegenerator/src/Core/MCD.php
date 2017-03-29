<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/09/16
 * Time: 04:04 م
 */

namespace Berthe\Codegenerator\Core;

use Berthe\Codegenerator\Contrats\MCDConstraintInterface;
use Berthe\Codegenerator\Contrats\MCDRelationConstraintInterface;
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
use Berthe\Codegenerator\Relation\HasManyThroughRelation;
use Berthe\Codegenerator\Relation\HasOneRelation;

class MCD implements MCDConstraintInterface, MCDRelationConstraintInterface
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
     * List of pivot tables
     *
     * @var array
     */
    private $pivots;

    /**
     * Messages to display when hovers relations link for table
     *
     * @var array
     */
    private $hoversMessages;

    /**
     * Hold current defined MCD Attribute class
     *
     * @var mixed
     */
    private $currentAttribut;

    /**
     * Hold current attribute name
     *
     * @var string
     */
    private $currentAttributeName;

    /**
     * Hold current relation (belongTo, hasOne, belongToMany) table name
     *
     * @var string
     */
    private $currentRelationTableName;

    /**
     * Table Domaine name
     *
     * @var array
     */
    private $domaines;

    /**
     * MCD constructor.
     */
    public function __construct()
    {
        $this->tables = array();

        $this->routes = array();

        $this->pivots = [];

        $this->domaines = array();

        $this->hoversMessages = [];

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
     * @param bool $pivot
     * @return $this
     */
    public function table($tableName = "table", $pivot = false){
        $this->tables[$tableName] = array();
        $this->currentTableName = $tableName;
        $this->tables[$this->currentTableName]['relations'] = array();

        if($pivot){
            $this->pivots[] = $tableName;
         }


        //$this->routes[$this->currentTableName."/clearSearch"] = ucfirst($this->currentTableName)."Controller@clearSearch";

        return $this;
    }

    /**
     * Function adding new string attribut to the current Attribute Array.
     * @param string $attrName
     * @param bool $required
     * @param int $nb_characters
     * @param bool $displayed
     * @param string $unit
     * @return $this
     */
    public function string($attrName = "string", $nb_characters = 0, $required = false, $displayed = true, $unit = ""){
        $this->currentAttributeName = $attrName;
        $this->currentAttributes[$attrName] = new StringType($attrName, $required, $nb_characters, $displayed, $unit);

        $this->currentAttributes[$attrName]->setColumnText($attrName);

        return $this;
    }

    /**
     * Function adding new integer attribute
     * @param string $attrName
     * @param bool $required
     * @param bool $displayed
     * @param string $unit
     * @return $this
     */
    public function integer($attrName="integer", $required = false, $displayed = true, $unit = ""){
        $this->currentAttributeName = $attrName;
        $this->currentAttributes[$attrName] = new IntegerType($attrName, $required, $displayed, $unit);

        $this->currentAttributes[$attrName]->setColumnText($attrName);

        return $this;
    }

    /**
     * @param string $attrName
     * @return $this
     */
    public function bigIncrements($attrName="biginc"){
        $this->currentAttributeName = $attrName;
        $this->currentAttributes[$attrName] = new BigIncrementsType($attrName);

        //Create an ID for the current Table if not exist
        $this->setTableID($attrName);

        $this->currentAttributes[$attrName]->setColumnText($attrName);

        return $this;
    }

    /**
     * @param string $attrName
     * @param bool $required
     * @param bool $displayed
     * @param string $unit
     * @return $this
     */
    public function bigInteger($attrName = "bigint", $required = false, $displayed = true, $unit = ""){
        $this->currentAttributeName = $attrName;
        $this->currentAttributes[$attrName] = new BigIntegerType($attrName, $required, $displayed, $unit);

        $this->currentAttributes[$attrName]->setColumnText($attrName);

        return $this;
    }

    /**
     * @param string $attrName
     * @param bool $required
     * @param bool $displayed
     * @param string $unit
     * @return $this
     */
    public function boolean($attrName = "bool", $required = false, $displayed = true, $unit = ""){
        $this->currentAttributeName = $attrName;
        $this->currentAttributes[$attrName] = new BooleanType($attrName, $required, $displayed, $unit);

        $this->currentAttributes[$attrName]->setColumnText($attrName);

        return $this;
    }

    /**
     * @param string $attrName
     * @param $required
     * @param int $nb_character
     * @param bool $displayed
     * @param string $unit
     * @return $this
     */
    public function char($attrName= "char", $nb_character = 0, $required = false, $displayed = true, $unit = ""){
        $this->currentAttributeName = $attrName;
        $this->currentAttributes[$attrName] = new CharType($attrName, $required, $nb_character, $displayed, $unit);

        $this->currentAttributes[$attrName]->setColumnText($attrName);

        return $this;
    }

    /**
     * @param string $attrName
     * @param bool $required
     * @param int $precision
     * @param int $scale
     * @param bool $displayed
     * @param string $unit
     * @return $this
     */
    public function decimal($attrName = "decimal", $precision = 0, $scale = 0, $required = false, $displayed = true, $unit = ""){
        $this->currentAttributeName = $attrName;
        $this->currentAttributes[$attrName] = new DecimalType($attrName, $required, $precision, $scale, $displayed, $unit);

        $this->currentAttributes[$attrName]->setColumnText($attrName);

        return $this;
    }

    /**
     * @param string $attrName
     * @param bool $required
     * @param int $digit
     * @param int $after
     * @param bool $displayed
     * @param $unit
     * @return $this
     */
    public function double($attrName = "double", $digit = 0, $after = 0, $required = false, $displayed = true, $unit = ""){
        $this->currentAttributeName = $attrName;
        $this->currentAttributes[$attrName] = new DoubleType($attrName, $required, $digit, $after, $displayed, $unit);

        $this->currentAttributes[$attrName]->setColumnText($attrName);

        return $this;
    }

    /**
     * @param string $attrName
     * @param array $elements
     * @return $this
     */
    public function enum($attrName = "enum", $elements = array()){
        $this->currentAttributeName = $attrName;
        $this->currentAttributes[$attrName] = new EnumType($attrName,$elements);
        return $this;
    }

    /**
     * @param string $attrName
     * @param bool $required
     * @param $precision
     * @param $scale
     * @param bool $displayed
     * @param string $unit
     * @return $this
     */
    public function float($attrName = "float", $precision, $scale, $required = false, $displayed = true, $unit = ""){
        $this->currentAttributeName = $attrName;
        $this->currentAttributes[$attrName] = new FloatType($attrName, $required, $precision, $scale, $displayed, $unit);

        $this->currentAttributes[$attrName]->setColumnText($attrName);

        return $this;
    }

    /**
     * @param string $attrName
     * @return $this
     */
    public function increments($attrName = "inc"){
        $this->currentAttributeName = $attrName;
        $this->currentAttributes[$attrName] = new IncrementsType($attrName);

        //Create an ID for the current Table if not exist
        $this->setTableID($attrName);

        $this->currentAttributes[$attrName]->setColumnText($attrName);

        return $this;
    }

    /**
     * @param string $attrName
     * @param bool $required
     * @param bool $displayed
     * @param $unit
     * @return $this
     */
    public function longText($attrName = "longtext", $required = false, $displayed = true, $unit = ""){
        $this->currentAttributeName = $attrName;
        $this->currentAttributes[$attrName] = new LongTextType($attrName, $required, $displayed, $unit);

        $this->currentAttributes[$attrName]->setColumnText($attrName);
        return $this;
    }

    /**
     * @param string $attrName
     * @param bool $autoIncrements
     * @param bool $displayed
     * @return $this
     */
    public function smallInteger($attrName = "smallint", $autoIncrements = false){
        $this->currentAttributeName = $attrName;
        $this->currentAttributes[$attrName] = new SmallIntegerType($attrName, $autoIncrements);

        //Create an ID for the current Table if not exist
        $this->setTableID($attrName);

        $this->currentAttributes[$attrName]->setColumnText($attrName);

        return $this;
    }

    /**
     * @param string $attrName
     * @param bool $required
     * @param bool $displayed
     * @param $unit
     * @return $this
     */
    public function text($attrName = "text", $required = false, $displayed = true, $unit = ""){
        $this->currentAttributeName = $attrName;
        $this->currentAttributes[$attrName] = new TextType($attrName, $required, $displayed, $unit);

        $this->currentAttributes[$attrName]->setColumnText($attrName);
        return $this;
    }

    /**
     * @param string $attrName
     * @return $this
     */
    public function timeStamp($attrName = "timestamps"){
        $this->currentAttributeName = $attrName;
        $this->currentAttributes[$attrName] = new TimeStampType($attrName);

        $this->currentAttributes[$attrName]->setColumnText($attrName);
        return $this;
    }

    /**
     * @param string $attrName
     * @param bool $required
     * @param bool $displayed
     * @param $unit
     * @return $this
     */
    public function tinyInteger($attrName = "tinyInteger", $required = false, $displayed = true, $unit = ""){
        $this->currentAttributeName = $attrName;
        $this->currentAttributes[$attrName] = new TinyIntegerType($attrName, $required, $displayed, $unit);

        //Create an ID for the current Table if not exist
        $this->setTableID($attrName);

        $this->currentAttributes[$attrName]->setColumnText($attrName);

        return $this;
    }

    /**
     * @param string $attrName
     * @param array $allowed
     * @return $this
     */
    public function set($attrName = "set", $allowed = array()){
        $this->currentAttributeName = $attrName;
        $this->currentAttributes[$attrName] = new SetType($attrName, $allowed);

        $this->currentAttributes[$attrName]->setColumnText($attrName);
        return $this;
    }

    /**
     * @param string $attrName
     * @param bool $required
     * @param bool $displayed
     * @param $unit
     * @return MCD
     */
    public function date($attrName = "date", $required = false, $displayed = true, $unit = ""){
        $this->currentAttributeName = $attrName;
        $this->currentAttributes[$attrName] = new DateType($attrName, $required, $displayed, $unit);

        $this->currentAttributes[$attrName]->setColumnText($attrName);
        return $this;
    }

    /**
     * Function adding new relation hasOne Type of relation to the list of the current table relations
     * @param string $tableName
     * @return $this
     */
    public function hasOne($tableName="table"){

        $this->setCurrentRelationTableName($tableName);

        $this->tables[$this->currentTableName]['relations'][] = new HasOneRelation($this->currentTableName, $tableName);

        //Adding Additional Route
        $this->routes[$this->currentTableName."/update".ucfirst($tableName)."/{"."$this->currentTableName}"] = ucfirst($this->currentTableName)."Controller@update".ucfirst($tableName);

        return $this;
    }

    /**
     * Function adding new relation hasMany Type of relation to the list of the current table relations
     * @param string $tableName
     * @param string $foreignKey
     * @param string $hoverMessage
     * @return MCD
     */
    public function hasMany($tableName="table", $foreignKey = "", $hoverMessage = ""){

        $this->setCurrentRelationTableName($tableName);

        $this->tables[$this->currentTableName]['relations'][] = new HasManyRelation($this->currentTableName, $tableName, $foreignKey);

        //Adding Additional Route
        $this->routes[$this->currentTableName."/add".ucfirst($tableName)."/{"."$this->currentTableName}"] = ucfirst($this->currentTableName)."Controller@add".ucfirst($tableName);


        $this->hoversMessages[$this->currentTableName . $tableName] = $hoverMessage;

        return $this;
    }

    /**
     * Function adding new relation belongsTo Type of relation to the list of the current table relations
     * @param string $tableName
     * @param string $foreignKey
     * @param string $parentKey
     * @return MCD
     */
    public function belongsTo($tableName ="table", $foreignKey = "", $parentKey = ""){

        $this->setCurrentRelationTableName($tableName);

        $this->tables[$this->currentTableName]['relations'][] = new BelongsToRelation($this->currentTableName, $tableName, $foreignKey, $parentKey);

        //Adding Additional Route
        $this->routes[$this->currentTableName."/update".ucfirst($tableName)."/{"."$this->currentTableName}"] = ucfirst($this->currentTableName)."Controller@update".ucfirst($tableName);

        return $this;
    }

    /**
     * Function adding new relation belongsToMany Type of relation to the list of the current table relations
     * @param string $tableName
     * @param string $hoverMessage
     * @return MCD
     */
    public function belongsToMany($tableName ="table", $hoverMessage = ""){

        $this->setCurrentRelationTableName($tableName);

        $this->tables[$this->currentTableName]['relations'][] = new BelongsToManyRelation($this->currentTableName, $tableName);

        //Adding Additional Route
        $this->routes[$this->currentTableName."/add".ucfirst($tableName)."/{"."$this->currentTableName}"] = ucfirst($this->currentTableName)."Controller@add".ucfirst($tableName);

        $this->hoversMessages[$this->currentTableName . $tableName] = $hoverMessage;

        return $this;
    }

    /**
     * Function adding new relation hasManyThrough Type of relation to the list of the current table relations
     * @param string $tableName
     * @param string $intermediate
     * @return MCD
     */
    public function hasManyThrough($tableName ="table", $intermediate = ""){

        $this->setCurrentRelationTableName($tableName);

        $this->tables[$this->currentTableName]['relations'][] = new HasManyThroughRelation($this->currentTableName, $tableName, $intermediate);

        //Adding Additional Route
        //$this->routes[$this->currentTableName."/add".ucfirst($tableName)."/{"."$this->currentTableName}"] = ucfirst($this->currentTableName)."Controller@add".ucfirst($tableName);

        $this->hoversMessages[$this->currentTableName . $tableName] = "";

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
        //var_dump($this->tables["country"]);
        return $this->tables;
    }

    /**
     * Get pivots tables
     *
     * @return array
     */
    public function getPivots(){
        return $this->pivots;
    }

    /**
     * Get Hovers table relation hovers Messages
     */
    public function getHoversMessages(){
        return $this->hoversMessages;
    }

    /**
     * Set Current Attribute Name
     *
     * @param $attrName
     */
    public function setCurrentAttributeName($attrName){
        $this->currentAttributeName = $attrName;
    }

    /**
     * Set current relation table name
     *
     * @param string $tableName
     */
    public function setCurrentRelationTableName($tableName = ""){
        $this->currentRelationTableName = $tableName;
    }

    /**
     * Get Current Relation Table name
     *
     * @return string
     */
    public function getCurrentRelationTableName(){
        return $this->currentRelationTableName;
    }

    /**
     * Allowed current attribute to be displayed in the list
     *
     * @param $inList bool
     *
     * @return MCD
     */
    public function inList($inList = true)
    {
        $this->currentAttributes[$this->currentAttributeName]->setInList($inList);
        return $this;
    }

    /**
     * Set current attribute to be Mandatory field
     *
     * @param $mandatory bool
     *
     * @return MCD
     */
    public function mandatory($mandatory = true)
    {
        $this->currentAttributes[$this->currentAttributeName]->mandatory($mandatory);
        return $this;
    }

    /**
     * Set a unit for the current attribute ($, Days, minutes...)
     *
     * @param string $unit
     * @return MCD
     */
    public function unit($unit = "")
    {
        $this->currentAttributes[$this->currentAttributeName]->setUnit($unit);
        return $this;
    }

    /**
     * Set the current table to be an intermediate table (So it will not be displayed in the list)
     *
     * @return MCD
     */
    public function pivot()
    {
        $this->pivots[] = $this->currentTableName;
        return $this;
    }

    /**
     * Specify on hover message for relation
     *
     * @param string $doc
     * @return $this
     */
    public function doc($doc = "")
    {
        $this->hoversMessages[$this->currentTableName . $this->getCurrentRelationTableName()] = $doc;
        return $this;
    }

    /**
     * Set the domaine for current table
     *
     * @param string $domain
     * @return $this
     */
    public function domain($domain = ""){

        if(key_exists($domain, $this->domaines)){
            $this->domaines[$domain][] = $this->currentTableName;
            return $this;
        }

        $this->domaines[$domain] = array();
        $this->domaines[$domain][] = $this->currentTableName;

        return $this;
    }

    /**
     *
     * Set Column Text for the actual Attribute
     *
     * @param string $columnText
     * @return $this
     */
    function columnText($columnText = "TextUnknow")
    {
        $this->currentAttributes[$this->currentAttributeName]->setColumnText($columnText);
        return $this;
    }


    /**
     * Get domaines
     *
     * @return array
     */
    public function getDomains(){
        return $this->domaines;
    }

}