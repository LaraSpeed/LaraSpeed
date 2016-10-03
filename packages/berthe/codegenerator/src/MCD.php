<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/09/16
 * Time: 04:04 م
 */

namespace Berthe\Codegenerator;


class MCD
{
    private $tables;

    private $currentTableName;

    private $currentAttributes;

    private $currentRelations;

    private $isEnded;

    public function __construct()
    {
        $this->tables = array();
        $this->init();
    }

    private function init(){
        $this->currentTableName = "table";
        $this->currentAttributes = array();
        $this->currentRelations = array();
        $this->isEnded = false;
    }

    /**
     * Function initializing adding table.
     * @param string $tableName
     * @return $this
     */
    public function table($tableName = "table"){
        $this->tables[$tableName] = array();
        $this->currentTableName = $tableName;
        return $this;
    }

    /**
     * Function adding new string attribut to the current Attribute Array.
     * @param string $attrName
     * @param int $nb_characters
     * @return $this
     */
    public function string($attrName = "string", $nb_characters = 0){
        $this->currentAttributes[$attrName] = new StringType($attrName, $nb_characters);
        return $this;
    }

    /**
     * Function adding new integer attribute
     * @param string $attrName
     * @return $this
     */
    public function integer($attrName="integer"){
        $this->currentAttributes[$attrName] = new IntegerType($attrName);
        return $this;
    }

    /**
     * @param string $attrName
     * @return $this
     */
    public function bigIncrements($attrName="biginc"){
        $this->currentAttributes[$attrName] = new BigIncrementsType($attrName);
        return $this;
    }

    /**
     * @param string $attrName
     * @return $this
     */
    public function bigInteger($attrName = "bigint"){
        $this->currentAttributes[$attrName] = new BigIntegerType($attrName);
        return $this;
    }

    /**
     * @param string $attrName
     * @return $this
     */
    public function boolean($attrName = "bool"){
        $this->currentAttributes[$attrName] = new BooleanType($attrName);
        return $this;
    }

    /**
     * @param string $attrName
     * @param int $nb_character
     * @return $this
     */
    public function char($attrName= "char", $nb_character = 0){
        $this->currentAttributes[$attrName] = new CharType($attrName, $nb_character);
        return $this;
    }

    /**
     * @param string $attrName
     * @param int $precision
     * @param int $scale
     * @return $this
     */
    public function decimal($attrName = "decimal", $precision = 0, $scale = 0){
        $this->currentAttributes[$attrName] = new DecimalType($attrName, $precision, $scale);
        return $this;
    }

    /**
     * @param string $attrName
     * @param int $digit
     * @param int $after
     * @return $this
     */
    public function double($attrName = "double", $digit = 0, $after = 0){
        $this->currentAttributes[$attrName] = new DoubleType($attrName, $digit, $after);
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
     * @param $precision
     * @param $scale
     * @return $this
     */
    public function float($attrName = "float", $precision, $scale){
        $this->currentAttributes[$attrName] = new FloatType($attrName, $precision, $scale);
        return $this;
    }

    /**
     * @param string $attrName
     * @return $this
     */
    public function increments($attrName = "inc"){
        $this->currentAttributes[$attrName] = new IncrementsType($attrName);
        return $this;
    }

    /**
     * @param string $attrName
     * @return $this
     */
    public function longText($attrName = "longtext"){
        $this->currentAttributes[$attrName] = new LongTextType($attrName);
        return $this;
    }

    /**
     * @param string $attrName
     * @param bool $autoIncrements
     * @return $this
     */
    public function smallInteger($attrName = "smallint", $autoIncrements = false){
        $this->currentAttributes[$attrName] = new SmallIntegerType($attrName, $autoIncrements);
        return $this;
    }

    /**
     * @param string $attrName
     * @return $this
     */
    public function text($attrName = "text"){
        $this->currentAttributes[$attrName] = new TextType($attrName);
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
     * Function adding new relation hasMany Type of relation to the list of the current table relations
     * @param string $tableName
     * @return $this
     */
    public function hasMany($tableName="table"){
        $this->currentRelations['hasMany'][] = $tableName;
        return $this;
    }

    /**
     * Function adding new relation belongsTo Type of relation to the list of the current table relations
     * @param string $tableName
     * @return $this
     */
    public function belongsTo($tableName ="table"){
        $this->currentRelations["belongsTo"][] = $tableName;
        return $this;
    }

    /**
     * Function committing add new Table to the MCD.
     * @return $this
     */
    public function end(){
        $this->tables[$this->currentTableName]['attributs'] = $this->currentAttributes;
        $this->tables[$this->currentTableName]['relations'] = $this->currentRelations;
        $this->init();
        return $this;
    }

    public function getSite(){
        return $this->tables;
    }

}