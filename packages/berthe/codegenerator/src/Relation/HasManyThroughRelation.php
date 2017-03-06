<?php
/**
 * Created by PhpStorm.
 * User: minfo
 * Date: 26/02/2017
 * Time: 17:38
 */

namespace Berthe\Codegenerator\Relation;


use Berthe\Codegenerator\Contrats\ControllerRelationInterface;
use Berthe\Codegenerator\Contrats\FormRelationInterface;
use Berthe\Codegenerator\Contrats\ModelRelationInterface;

class HasManyThroughRelation extends BaseRelation implements FormRelationInterface, ModelRelationInterface, ControllerRelationInterface
{

    /**
     * View name representing the "HTML form" associated to the relation when inserting it. (See "views" folder)
     *
     * @var string
     */
    public $formView = "mockup";

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
    public $modelView = "hasManyThroughModelMethod";

    /**
     * View name representing the code to add in table's Controller
     *
     * @var string
     */
    public $actionView = "hasManyThroughController";

    /**
     * View name representing the "HTML code" to perform table relation edit
     *
     * @var string
     */
    public $editView = "mockup";

    /**
     * View name for representing function to handle request in the controller for this relation on the table
     *
     * @var string
     */
    public $action = "hasManyThroughAction";

    /**
     * View name for generating Accessor in the Model of the table for this Relation
     *
     * @var string
     */
    public $relationAccessor = "hasManyRelationAccessor";

    /**
     * HasManyRelation constructor.
     * @param string $table
     * @param string $final
     * @param string $intermediate
     */
    public function __construct($table = "table", $final = "finalTable", $intermediate = "intermediate")
    {
        parent::__construct("hasManyThrough", $table, $final, $intermediate);
    }

    function getActionView()
    {
        return $this->actionView;
    }

    function getAction()
    {
        return $this->action;
    }

    function getFormView()
    {
        return $this->formView;
    }

    function getDisplayView()
    {
        return $this->displayView;
    }

    function getEditView()
    {
        return $this->editView;
    }

    function getModelView()
    {
        return $this->modelView;
    }

    function isHasManyThrough(){
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