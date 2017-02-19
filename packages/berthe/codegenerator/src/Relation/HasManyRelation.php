<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 05/10/16
 * Time: 10:48 ص
 *
 * This class represent HasMany Type relation between tables
 */

namespace Berthe\Codegenerator\Relation;

use Berthe\CodeGenerator\Contrats\FormRelationInterface;
use Berthe\CodeGenerator\Contrats\ModelRelationInterface;
use Berthe\CodeGenerator\Contrats\ControllerRelationInterface;


class HasManyRelation extends BaseRelation implements FormRelationInterface, ModelRelationInterface, ControllerRelationInterface
{
    /**
     * View name representing the "HTML form" associated to the relation when inserting it. (See "views" folder)
     *
     * @var string
     */
    public $formView = "hasManyForm";

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
    public $modelView = "singleArgModelRelation";

    /**
     * View name representing the code to add in table's Controller
     *
     * @var string
     */
    public $actionView = "hasManyController";

    /**
     * View name representing the "HTML code" to perform table relation edit
     *
     * @var string
     */
    public $editView = "hasManyEdit";

    /**
     * View name for representing function to handle request in the controller for this relation on the table
     *
     * @var string
     */
    public $action = "hasManyAction";

    /**
     * View name for generating Accessor in the Model of the table for this Relation
     *
     * @var string
     */
    public $relationAccessor = "hasManyRelationAccessor";

    /**
     * HasManyRelation constructor.
     * @param string $table
     * @param string $other
     */
    public function __construct($table = "table", $other = "otherTable")
    {
        parent::__construct("hasMany", $table, $other);
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
     * Get Controller action view name
     *
     * @return string
     */
    function getActionView()
    {
        return $this->actionView;
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
     * Test if the relation is "HasMany" Type
     *
     * @return bool
     */
    function isHasMany()
    {
        return true;
    }

    /**
     * Get relation accessor view name
     *
     * @return string
     */
    function getRelationAccessor()
    {
        return $this->relationAccessor;
    }
}