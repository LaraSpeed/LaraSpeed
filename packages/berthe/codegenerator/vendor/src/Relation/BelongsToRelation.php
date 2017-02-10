<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 06/10/16
 * Time: 01:08 م
 *
 * This class represent BelongsTo Type relation between tables
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
    public $displayView = "belongsToDisplay";

    /**
     * View name representing the code to add in the table's Model
     *
     * @var string
     */
    public $modelView = "singleArgModelRelation";

    /**
     * View name representing the code to add in table's Controller
     *
     * @var string
     */
    public $actionView = "belongsToController";

    /**
     * View name for generating constraint code related to the table
     *
     * @var string
     */
    public $foreignConstraintView = "foreignConstraintView";

    /**
     * View name for generating drop table code.
     *
     * @var string
     */
    public $dropTableConstraintView = "dropTableConstraintView";

    /**
     * View name representing the "HTML code" to perform table relation edit
     *
     * @var string
     */
    public $editView = "belongsToEdit";

    /**
     * View name for representing function to handle request in the controller for this relation on the table
     *
     * @var string
     */
    public $action = "belongsToAction";

    /**
     * BelongsToRelation constructor.
     * @param string $table
     * @param string $other
     */
    public function __construct($table="table", $other="otherTable")
    {
        parent::__construct("belongsTo", $table, $other);
    }

    /**
     * Get form view name
     *
     * @return string
     */
    function getFormView()
    {
        return $this->formView;
    }

    /**
     * Get display view name
     *
     * @return string
     */
    function getDisplayView()
    {
        return $this->displayView;
    }

    /**
     * Get model view name
     *
     * @return string
     */
    function getModelView()
    {
        return $this->modelView;
    }

    /**
     * Get foreign constraint view name
     *
     * @return string
     */
    function getForeignConstraintView()
    {
        return $this->foreignConstraintView;
    }

    /**
     * Get drop table constraint view name
     *
     * @return string
     */
    function getDropTableConstraintView()
    {
        return $this->dropTableConstraintView;
    }

    /**
     * Get Controller action view name
     *
     * @return string
     */
    function getActionView()
    {
        return $this->actionView;
    }

    /**
     * Test if the relation has Constraint
     *
     * @return bool
     */
    function hasConstraint()
    {
        return true;
    }


    /**
     * Get edit form view name
     *
     * @return string
     */
    function getEditView()
    {
        return $this->editView;
    }

    /**
     * Get action view name
     *
     * @return string
     */
    function getAction()
    {
        return $this->action;
    }

    /**
     * Test if the table is belongTo Relation
     *
     * @return bool
     */
    function isBelongsTo()
    {
        return true;
    }
}