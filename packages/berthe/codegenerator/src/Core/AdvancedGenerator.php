<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 01:41 م
 *
 *This Class is the core class of the application, it define the actual definition of code generation logic for different components.
 */

namespace Berthe\Codegenerator\Core;
use Berthe\Codegenerator\Contrats\IAdvancedLaravelGenerator;
use Berthe\Codegenerator\Templates\EditTemplate;
use Berthe\Codegenerator\Templates\RelatedTemplate;
use Berthe\Codegenerator\Templates\Templater;
use Berthe\Codegenerator\Templates\ControllerTemplate;
use Berthe\Codegenerator\Templates\DisplayTemplate;
use Berthe\Codegenerator\Templates\FormTemplate;
use Berthe\Codegenerator\Templates\ModelTemplate;
use Berthe\Codegenerator\Templates\SchemaTemplate;
use Berthe\Codegenerator\Templates\SingleDisplayTemplate;
use Berthe\Codegenerator\Normalizer\BasicNormalization;
use Berthe\Codegenerator\Normalizer\InheritMaster;
use Berthe\Codegenerator\Utils\FileUtils;
use Berthe\Codegenerator\Utils\TemplateProvider;



class AdvancedGenerator implements IAdvancedLaravelGenerator
{
    /**
     * Contains the Conceptual Data Model as an array with the following structure :
     *
     *  [
     *      //Table
     *      "table1" => [
     *          "attributes" => ["attribute1" => Type, "attribute2" => Type...],
     *          "relations" => ["RelationType" => ["table1", "table2"...]],
     *      ],
     *      ...
     *  ]
     *
     * @var array
     */
    public $mda;



    /**
     * Contains the Configuration variable defined in "app/in/GeneratorCode.php"
     *
     * @var BasicConfig
     */
    public $config;


    /**
     * List of resources (css and js files for example) to be initially loaded.
     *
     * @var array
     */
    public $resources = array(
        //Add ressources like "Input" => "Output"

        //VIEWS
        "formMaster.blade.php" => "resources/views/master.blade.php",
        "modal.blade.php" => "resources/views/modal.blade.php",

        //CSS
        "bootstrap3.css" => "public/css/bootstrap3.css",
        "simple-sidebar.css" => "public/css/simple-sidebar.css",
        "bootstrap-datepicker.css" => "public/css/bootstrap-datepicker.css",
        "custom.css" => "public/css/custom.css",
        "bootstrap-duallistbox.css" => "public/css/bootstrap-duallistbox.css",
        "prettify.min.css" => "public/css/prettify.min.css",

        //JS
        "jquery.js" => "public/js/jquery.js",
        "angular1.js" => "public/js/angular.js",
        "bootstrap3.js" => "public/js/bootstrap3.js",
        "bootstrap-datepicker.js" => "public/js/bootstrap-datepicker.js",
        "script.js" => "public/js/script.js",
        "jquery.bootstrap-duallistbox.js" => "public/js/jquery.bootstrap-duallistbox.js",
        "prettyfy.min.js" => "public/js/prettyfy.min.js",

        //Fonts
        "glyphicons-halflings-regular.eot" => "public/fonts/glyphicons-halflings-regular.eot",
        "glyphicons-halflings-regular.svg" => "public/fonts/glyphicons-halflings-regular.svg",
        "glyphicons-halflings-regular.ttf" => "public/fonts/glyphicons-halflings-regular.ttf",
        "glyphicons-halflings-regular.woff" => "public/fonts/glyphicons-halflings-regular.woff",
        "glyphicons-halflings-regular.woff2" => "public/fonts/glyphicons-halflings-regular.woff2"
    );

    /**
     * List of image files to loaded.
     *
     * @var array
     */
    public $img = array(
        "asc.png" => "public/asc.png",
        "desc.png" => "public/desc.png",
        "none.png" => "public/none.png"
    );

    /**
     * List of route needed for relation between tables
     * @var array
     */
    public $routes;


    /**
     * AdvancedGenerator constructor.
     * @param array $table
     * @param array $config
     * @param array $routes
     */
    public function __construct($table = array(), $config = array(), $routes = array())
    {
        $this->mda = $table;
        $this->config = new BasicConfig($config);
        $this->routes = $routes;

        //Load Some Simple required Files (master.blade.php, angular1.js) and images like (Sort Arrows).
        (new ResourcesLoader($this->resources, $this->img))->load()->loadImages();
        
    }

    /**
     * Generate single components (Controller, Model, ....) file for every table based on it's parameter Templater.
     *
     * @param Templater $templater
     * @return \Generator
     */
    function generateLaravel(Templater $templater)
    {
        try {
            foreach ($this->mda as $tableName => $table) {

                $table['title'] = $tableName; //var_dump($table['relations']);

                $fileGenerator = new FileGenerator(TemplateProvider::getTemplate($templater->getName()), ["table" => $table, "tbs" => $this->mda, "config" => $this->config]);

                $path = $templater->getPath($tableName);

                $fileGenerator->put($path);

                //Change Dir Right.
                chmod($path, 0777);

                yield $path;
            }

        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    /**
     * Generate Model
     *
     * @return void
     */
    function generateLaravelModel()
    {
        FileUtils::normalizeFile("<?php \n", $this->generateLaravel(new ModelTemplate), new BasicNormalization);
    }

    /**
     * Generate Schema
     *
     * @return void
     */
    function generateLaravelSchema()
    {
        FileUtils::normalizeFile("<?php \n", $this->generateLaravel(new SchemaTemplate), new BasicNormalization);
    }

    /**
     * Generate Controller
     *
     * @return void
     */
    function generateLaravelController()
    {
        FileUtils::normalizeFile("<?php \n", $this->generateLaravel(new ControllerTemplate), new BasicNormalization);
    }

    /**
     * Generate Creation Form
     *
     * @return void
     */
    function generateLaravelForm()
    {
        FileUtils::normalizeFile("", $this->generateLaravel(new FormTemplate($this->config->version(), $this->routes)), new InheritMaster(new BasicNormalization));
    }


    /**
     * Generate list of table elements list.
     *
     */
    public function generateLaravelShowForm()
    {
        FileUtils::normalizeFile("", $this->generateLaravel(new DisplayTemplate), new InheritMaster(new BasicNormalization));
    }

    /**
     * Generate single table element view
     *
     * @return void
     */
    public function generateLaravelDisplaySingleElement()
    {
        FileUtils::normalizeFile("", $this->generateLaravel(new SingleDisplayTemplate), new InheritMaster(new BasicNormalization));
    }

    /**
     * Generate Edit form
     *
     * @return void
     */
    public function generateLaravelEditForm()
    {
        FileUtils::normalizeFile("", $this->generateLaravel(new EditTemplate), new InheritMaster(new BasicNormalization));
    }

    /**
     * Generate relation betwwen tables display form
     *
     * @return void
     */
    public function generateLaravelRelatedForm()
    {
        FileUtils::normalizeFile("", $this->generateLaravel(new RelatedTemplate), new InheritMaster(new BasicNormalization));
    }


    /**
     * Generate component based on it name (Form, Controller)
     *
     * NB : This is used to hide generateForm(), generateController(), ... methods implementation
     *
     * @param string $type
     */
    public function generate($type = "Form")
    {
        echo "Generate ".$type." started !\n";
        $generateMethod = "generateLaravel".$type;
        $this->$generateMethod();
        echo "Generate ".$type." finished !\n";
    }

    /**
     * Generate Constraint for the Schema
     *
     * @param string $template
     * @param string $outdir
     */
    public function generateLaravelSchemaConstraint($template = "constraints", $outdir = "")
    {
        $tbs = $this->mda;
        $fileGenerator = new FileGenerator(TemplateProvider::getTemplate($template), ["tbs" => $tbs]);
        $path = base_path($outdir).'/20'.date('y_m_0j_his').'_create_foreign_keys.php';
        $fileGenerator->put($path);
        chmod($path, 0777);
        FileUtils::prependString("<?php \n", $path);
    }

    /**
     * Generate one components based on the Templater Specified, his differ from "generateLaravel()" method which generate all components.
     *
     * @param Templater $templater
     */
    public function generateLaravelSimpleFile(Templater $templater)
    {
        $tbs = $this->mda;
        $fileGenerator = new FileGenerator(TemplateProvider::getTemplate($templater->getName()), ["tbs" => $tbs]);
        $fileGenerator->put($templater->getPath(""));
        chmod($templater->getPath(""), 0777);
        //FileUtils::prependString("<?php \n", $path);
    }
}