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

        //JS
        "jquery.js" => "public/js/jquery.js",
        "angular1.js" => "public/js/angular.js",
        "bootstrap3.js" => "public/js/bootstrap3.js",
        "script.js" => "public/js/script.js"
    );
    
    public $img = array(
        "asc.png" => "public/asc.png",
        "desc.png" => "public/desc.png",
        "none.png" => "public/none.png"
    );

    public function __construct($table = array(), $config = array())
    {
        $this->mda = $table;
        $this->config = new BasicConfig($config);

        //Load Some Simple required Files (master.blade.php, angular1.js) and images like (Sort Arrows).
        (new ResourcesLoader($this->resources, $this->img))->load()->loadImages();
        
    }

    function generateLaravel(Templater $templater)
    {
        foreach($this->mda as $tableName => $table){
            
            $table['title'] = $tableName; //var_dump($table['relations']);

            $fileGenerator = new FileGenerator(TemplateProvider::getTemplate($templater->getName()), ["table" => $table, 'tbs' => $this->mda]);

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
        FileUtils::normalizeFile("", $this->generateLaravel(new FormTemplate($this->config->version())), new InheritMaster(new BasicNormalization));
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
}