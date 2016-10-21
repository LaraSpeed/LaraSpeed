<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 06/10/16
 * Time: 01:08 م
 */

namespace Berthe\Codegenerator\Relation;


use Berthe\Codegenerator\Contrats\ConstraintRelationInterface;
use Berthe\Codegenerator\Contrats\ControllerRelationInterface;
use Berthe\Codegenerator\Contrats\FormRelationInterface;
use Berthe\Codegenerator\Contrats\ModelRelationInterface;

class BelongsToRelation extends BaseRelation implements FormRelationInterface,
                                    ModelRelationInterface, ControllerRelationInterface,
                                    ConstraintRelationInterface
{

    public $formView = "belongsToForm";
    public $displayView = "belongsToDisplay";
    public $modelView = "singleArgModelRelation";
    public $actionView = "belongsToController";
    public $foreignConstraintView = "foreignConstraintView";
    public $dropTableConstraintView = "dropTableConstraintView";
    public $editView = "belongsToEdit";
    public $action = "belongsToAction";

    public function __construct($table="table", $other="otherTable")
    {
        parent::__construct("belongsTo", $table, $other);
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

    function getForeignConstraintView()
    {
        return $this->foreignConstraintView;
    }

    function getDropTableConstraintView()
    {
        return $this->dropTableConstraintView;
    }

    function getActionView()
    {
        return $this->actionView;
    }

    function hasConstraint()
    {
        return true;
    }

    function getEditView()
    {
        return $this->editView;
    }

    function getAction()
    {
        return $this->action;
    }
}