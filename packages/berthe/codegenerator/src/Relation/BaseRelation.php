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

    /**
     * BaseRelation constructor.
     * @param $type : Type of relation (hasMany, hasOne, BelongsTo....).
     * @param $table : current concern table
     * @param $other : other table concerned.
     */
    public function __construct($type = "hasMany", $table = "table", $other = "concernTable")
    {
        $this->type = $type;
        $this->table = $table;
        $this->otherTable = $other;
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
    
    function getRelationAccessor(){
        return "defaultRelationAccessor";
    }
}