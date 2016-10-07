<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 07/10/16
 * Time: 01:42 م
 */

namespace Berthe\Codegenerator\Relation;


use Berthe\Codegenerator\Contrats\ControllerRelationInterface;
use Berthe\Codegenerator\Contrats\FormRelationInterface;
use Berthe\Codegenerator\Contrats\ModelRelationInterface;

class BelongsToManyRelation extends BaseRelation implements FormRelationInterface, ControllerRelationInterface, ModelRelationInterface
{
    public $formView = "belongsToForm";
    public $displayView = "hasManyDisplay";
    public $modelView = "singleArgModelRelation";
    public $actionView = "belongsToController";

    public function __construct($table = "", $other = "")
    {
        parent::__construct("belongsToMany", $table, $other);
    }

    function getFormView()
    {
        return $this->formView;
    }

    function getDisplayView()
    {
        return $this->displayView;
    }

    function getModelView()
    {
        return $this->modelView;
    }


    function getActionView()
    {
        return $this->actionView;
    }
}