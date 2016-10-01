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
     * @return $this
     */
    public function string($attrName = "string"){
        $this->currentAttributes[$attrName] = gettype("");
        return $this;
    }

    /**
     * Function adding new integer attribute
     * @param string $attrName
     * @return $this
     */
    public function integer($attrName="integer"){
        $this->currentAttributes[$attrName] = gettype(0);
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