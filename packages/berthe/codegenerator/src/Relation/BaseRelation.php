<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 04/10/16
 * Time: 06:20 م
 */

namespace Berthe\Codegenerator\Relation;

use Berthe\Codegenerator\Contrats\RelationSpecificationInterface;

class BaseRelation implements RelationSpecificationInterface
{
    
    public $type;
    public $table;
    public $otherTable;
    public $intermediate;
    public $foreignKey;
    public $parentKey;

    /**
     * BaseRelation constructor.
     * @param $type : Type of relation (hasMany, hasOne, BelongsTo....).
     * @param $table : current concern table
     * @param $other : other table concerned.
     * @param $intermediate : intermediate table for hasManyThrough relation
     */
    public function __construct($type = "hasMany", $table = "table", $other = "concernTable", $intermediate = "intermediate")
    {
        $this->type = $type;
        $this->table = $table;
        $this->otherTable = $other;
        $this->intermediate = $intermediate;
        $this->foreignKey = "";
        $this->parentKey = "";
    }

    function getForeignKey(){
        return $this->foreignKey;
    }

    function setForeignKey($foreignKey = ""){
        $this->foreignKey = $foreignKey;
    }

    function getParentKey(){
        return $this->parentKey;
    }

    function setParentKey($parentKey = ""){
        $this->parentKey = $parentKey;
    }

    function getType(){
        return $this->type;
    }

    function getTable(){
        return $this->table;
    }

    function getOtherTable(){
        return $this->otherTable;
    }

    function getIntermediateTable(){
        return $this->intermediate;
    }

    function hasConstraint(){
        return false;
    }

    function hasConstraints()
    {
        return false;
    }

    function isFormDisplayable()
    {
        return true;
    }

    function isBelongsTo(){
        return false;
    }

    function isBelongsToMany(){
        return false;
    }

    function isHasMany(){
        return false;
    }

    function isHasManyThrough(){
        return false;
    }
    
    function getRelationAccessor(){
        return "defaultRelationAccessor";
    }
}