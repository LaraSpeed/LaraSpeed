<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 01:41 م
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
    public $mda;
    public $config;
    
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
        "prettyfy.min.js" => "public/js/prettyfy.min.js"
    );
    
    public $img = array(
        "asc.png" => "public/asc.png",
        "desc.png" => "public/desc.png",
        "none.png" => "public/none.png"
    );

    public $routes;

    public function __construct($table = array(), $config = array(), $routes = array())
    {
        $this->mda = $table;
        $this->config = new BasicConfig($config);
        $this->routes = $routes;

        //Load Some Simple required Files (master.blade.php, angular1.js) and images like (Sort Arrows).
        (new ResourcesLoader($this->resources, $this->img))->load()->loadImages();
        
    }

    function generateLaravel(Templater $templater)
    {
        foreach($this->mda as $tableName => $table){
            
            $table['title'] = $tableName; //var_dump($table['relations']);

            $fileGenerator = new FileGenerator(TemplateProvider::getTemplate($templater->getName()), ["table" => $table, "tbs" => $this->mda, "config" => $this->config]);

            $path = $templater->getPath($tableName);

            $fileGenerator->put($path);

            //Change Dir Right.
            chmod($path, 0777);

            yield $path;
        }
    }

    function generateLaravelModel()
    {
        FileUtils::normalizeFile("<?php \n", $this->generateLaravel(new ModelTemplate), new BasicNormalization);
    }

    function generateLaravelSchema()
    {
        FileUtils::normalizeFile("<?php \n", $this->generateLaravel(new SchemaTemplate), new BasicNormalization);
    }

    function generateLaravelController()
    {
        FileUtils::normalizeFile("<?php \n", $this->generateLaravel(new ControllerTemplate), new BasicNormalization);
    }

    function generateLaravelForm()
    {
        FileUtils::normalizeFile("", $this->generateLaravel(new FormTemplate($this->config->version(), $this->routes)), new InheritMaster(new BasicNormalization));
    }

    public function generateLaravelShowForm()
    {
        FileUtils::normalizeFile("", $this->generateLaravel(new DisplayTemplate), new InheritMaster(new BasicNormalization));
    }

    public function generateLaravelDisplaySingleElement()
    {
        FileUtils::normalizeFile("", $this->generateLaravel(new SingleDisplayTemplate), new InheritMaster(new BasicNormalization));
    }

    public function generateLaravelEditForm()
    {
        FileUtils::normalizeFile("", $this->generateLaravel(new EditTemplate), new InheritMaster(new BasicNormalization));
    }

    public function generateLaravelRelatedForm()
    {
        FileUtils::normalizeFile("", $this->generateLaravel(new RelatedTemplate), new InheritMaster(new BasicNormalization));
    }

    public function generate($type = "Form")
    {
        echo "Generate ".$type." started !\n";
        $generateMethod = "generateLaravel".$type;
        $this->$generateMethod();
        echo "Generate ".$type." finished !\n";
    }

    public function generateLaravelSchemaConstraint($template = "constraints", $outdir = "")
    {
        $tbs = $this->mda;
        $fileGenerator = new FileGenerator(TemplateProvider::getTemplate($template), ["tbs" => $tbs]);
        $path = base_path($outdir).'/20'.date('y_m_0j_his').'_create_foreign_keys.php';
        $fileGenerator->put($path);
        chmod($path, 0777);
        FileUtils::prependString("<?php \n", $path);
    }

    public function generateLaravelSimpleFile(Templater $templater)
    {
        $tbs = $this->mda;
        $fileGenerator = new FileGenerator(TemplateProvider::getTemplate($templater->getName()), ["tbs" => $tbs]);
        $fileGenerator->put($templater->getPath(""));
        chmod($templater->getPath(""), 0777);
        //FileUtils::prependString("<?php \n", $path);
    }
}