<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 01/09/16
 * Time: 05:40 م
 *
 * This Class is use by "app/in/GeneratorCode.php" to handle generation of code when type on command line "php artisan code:generate",
 * It use AdvancedGenerator Cass to generate different components of the project such as :
 *  (Table insert and update Forms, display, schema, model, controller)
 * .
 */

namespace Berthe\Codegenerator\Core;
use Berthe\Codegenerator\Core\AdvancedGenerator;
use Berthe\Codegenerator\Normalizer\SimpleInheritMaster;
use Berthe\Codegenerator\Templates\AuthenticateTemplate;
use Berthe\Codegenerator\Templates\GenericFormTemplate;
use Berthe\Codegenerator\Templates\SideBarTemplate;
use Berthe\Codegenerator\Normalizer\InheritMaster;
use Berthe\Codegenerator\Normalizer\BasicNormalization;

class CallGenerator
{
    /**
     * Use to get routes for relation between tables
     *
     * @var array
     */
    private $routes;

    /**
     * List of pivots tables
     *
     * @var array
     */
    private $pivots;

    /**
     * Table relations Hovers Messages
     *
     * @var array
     */
    private $hoverMessages;

    /**
     * Currrent application ACL
     *
     * @var ACL
     */
    private $ACL;

    /**
     * Get the "Conceptual Data Model" as an array.
     * It's actually the one overrided in "app/in/GeneratorCode.php" file to define "Conceptual Data Model".
     *
     * @return array
     */
    public function getSite(){
        return array();
    }

    /**
     * Set $route variable
     *
     * @param array $routes
     */
    public function setRoutes($routes = array()){
        $this->routes = $routes;
    }

    /**
     * Set the list of pivots tables
     *
     * @param array $pivots
     */
    public function setPivots($pivots = []){
        $this->pivots = $pivots;
    }

    /**
     * Set Hovers Message
     *
     * @param array $hoverMessages
     */
    public function setHoverMessages($hoverMessages = []){
        $this->hoverMessages = $hoverMessages;
    }

    /**
     * Get Application ACL
     *
     * @return ACL
     */
    public function getACL(){
        return $this->ACL;
    }

    /**
     * Set Application ACL
     *
     * @param ACL $ACL
     */
    public function setACL(ACL $ACL){
        $this->ACL = $ACL;
    }

    /**
     * Generate different component (Controllers, Schemas, Models and forms).
     * It's fired when "php artisan code:generate" is called.
     *
     * @return void
     */
    public function index()
    {
        $mcd = $this->getSite();
        $this->configs["pivots"] = $this->pivots;
        $this->configs["hoverMessages"] = $this->hoverMessages;
        $this->configs["acl"] = $this->getACL();

        $laravelGenerator = new AdvancedGenerator($mcd, $this->configs, $this->routes);
            //new LaravelCodeGenerator($this->getSite());
        $laravelGenerator->generate();
        $laravelGenerator->generate('ShowForm');
        $laravelGenerator->generate('DisplaySingleElement');
        $laravelGenerator->generate('EditForm');
        $laravelGenerator->generate('RelatedForm');
        //$laravelGenerator->generate('Schema');
        $laravelGenerator->generate('Model');
        $laravelGenerator->generate('Controller');
        $laravelGenerator->generate('Schema');
        $laravelGenerator->generateLaravelSchemaConstraint("constraint", 'database/migrations');
        $laravelGenerator->generateLaravelSimpleFile(new SideBarTemplate);

        //Generate SignUp/In Form
        $laravelGenerator->generateLaravelSimpleFile(new AuthenticateTemplate("login", "signin"), new SimpleInheritMaster(new BasicNormalization), "");
        $laravelGenerator->generateLaravelSimpleFile(new AuthenticateTemplate("register", "signup"), new SimpleInheritMaster(new BasicNormalization), "");
        $laravelGenerator->generateLaravelSimpleFile(new GenericFormTemplate("home", "home", "resources/views"), new SimpleInheritMaster(new BasicNormalization()), "");

        chmod("resources/views/master.blade.php", 0777);
    }

}