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
    public $editView = "belongsToManyEdit";
    public $action = "belongsToManyAction";
    public $relationAccessor = "hasManyRelationAccessor";

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

    function getEditView()
    {
        return $this->editView;
    }

    function getAction()
    {
        return $this->action;
    }

    function getRelationAccessor()
    {
        return $this->relationAccessor;
    }

    function isBelongsToMany()
    {
        return true;
    }
}