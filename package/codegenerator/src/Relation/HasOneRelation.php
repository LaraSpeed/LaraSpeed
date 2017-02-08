<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 06/10/16
 * Time: 01:28 م
 */

namespace Berthe\Codegenerator\Relation;


use Berthe\Codegenerator\Contrats\ControllerRelationInterface;
use Berthe\Codegenerator\Contrats\FormRelationInterface;
use Berthe\Codegenerator\Contrats\ModelRelationInterface;

class HasOneRelation extends BaseRelation implements FormRelationInterface, ModelRelationInterface,
                                                     ControllerRelationInterface
{

    public $formView = "hasOneForm";
    public $displayView = "hasOneDisplay";
    public $modelView = "singleArgModelRelation";
    public $actionView = "hasOneController";
    public $editView = "hasOneEdit";
    public $action = "hasOneAction";

    public function __construct($table = "table", $other = "otherTable")
    {
        parent::__construct("hasOne", $table, $other);
    }

    function getActionView()
    {
        return $this->actionView;
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

    function getEditView()
    {
        return $this->editView;
    }

    function getAction()
    {
        return $this->action;
    }
    
}