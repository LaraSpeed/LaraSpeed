<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 07/10/16
 * Time: 01:42 م
 *
 * This class represent BelongsToMany Type relation between tables
 */

namespace Berthe\Codegenerator\Relation;


use Berthe\Codegenerator\Contrats\ControllerRelationInterface;
use Berthe\Codegenerator\Contrats\FormRelationInterface;
use Berthe\Codegenerator\Contrats\ModelRelationInterface;

class BelongsToManyRelation extends BaseRelation implements FormRelationInterface, ControllerRelationInterface, ModelRelationInterface
{
    /**
     * View name representing the "HTML form" associated to the relation when inserting it. (See "views" folder)
     *
     * @var string
     */
    public $formView = "belongsToForm";

    /**
     * View name representing the "HTML form" associated to the relation when displaying it.
     *
     * @var string
     */
    public $displayView = "hasManyDisplay";

    /**
     * View name representing the code to add in the table's Model
     *
     * @var string
     */
    public $modelView = "BelongToManyModelMethod";

    /**
     * View name representing the code to add in table's Controller
     *
     * @var string
     */
    public $actionView = "belongsToController";

    /**
     * View name representing the "HTML code" to perform table relation edit
     *
     * @var string
     */
    public $editView = "belongsToManyEdit";

    /**
     * View name for representing function to handle request in the controller for this relation on the table
     *
     * @var string
     */
    public $action = "belongsToManyAction";

    /**
     * View name for generating Accessor in the Model of the table for this Relation
     *
     * @var string
     */
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