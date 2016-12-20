<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 05/10/16
 * Time: 10:48 ص
 */

namespace Berthe\Codegenerator\Relation;

use Berthe\CodeGenerator\Contrats\FormRelationInterface;
use Berthe\CodeGenerator\Contrats\ModelRelationInterface;
use Berthe\CodeGenerator\Contrats\ControllerRelationInterface;


class HasManyRelation extends BaseRelation implements FormRelationInterface, ModelRelationInterface, ControllerRelationInterface
{
    public $formView = "hasManyForm";
    public $displayView = "hasManyDisplay";
    public $modelView = "singleArgModelRelation";
    public $actionView = "hasManyController";
    public $editView = "hasManyEdit";
    public $action = "hasManyAction";
    public $relationAccessor = "hasManyRelationAccessor";

    public function __construct($table = "table", $other = "otherTable")
    {
        parent::__construct("hasMany", $table, $other);
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
}