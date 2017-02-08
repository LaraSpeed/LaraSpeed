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

    /**
     * View name representing the "HTML form" associated to the relation when inserting it. (See "views" folder)
     *
     * @var string
     */
    public $formView = "hasOneForm";

    /**
     * View name representing the "HTML form" associated to the relation when displaying it.
     *
     * @var string
     */
    public $displayView = "hasOneDisplay";

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
    public $actionView = "hasOneController";

    /**
     * View name representing the "HTML code" to perform table relation edit
     *
     * @var string
     */
    public $editView = "hasOneEdit";

    /**
     * View name for representing function to handle request in the controller for this relation on the table
     *
     * @var string
     */
    public $action = "hasOneAction";

    /**
     * HasOneRelation constructor.
     * @param string $table
     * @param string $other
     */
    public function __construct($table = "table", $other = "otherTable")
    {
        parent::__construct("hasOne", $table, $other);
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
    
}