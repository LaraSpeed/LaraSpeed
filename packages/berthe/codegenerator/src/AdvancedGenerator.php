<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 01:41 م
 */

namespace Berthe\Codegenerator;


class AdvancedGenerator implements IAdvancedLaravelGenerator
{
    public $mda;

    public function __construct($table = array())
    {
        $this->mda = $table;

        //Creating Master File. (=== Not Optimale But working Fine ===).
        $p = base_path('resources/views/')."master.blade.php";
        $content = file_get_contents(__DIR__.'/views/formMaster.blade.php');
        file_put_contents($p, $content);
    }

    function generateLaravel(Templater $templater)
    {
        foreach($this->mda as $tableName => $table){
            $table['title'] = $tableName;
            $fileGenerator = new FileGenerator(TemplateProvider::getTemplate($templater->getName()), ["table" => $table]);

            $path = $templater->getPath($tableName);

            /*Adding Route to routes/Web.php
            $toAppends = TemplateProvider::getResourceRouteTemplate($tableName, ucfirst($tableName).'Controller')."\n";
            $content = file_get_contents(base_path('routes/').'web.php');
            Teste if route don't already exist
            if(!str_contains($content, $toAppends)){
                $this->singleAppendStringToFile(
                    $toAppends,
                    base_path('routes/web.php')
                );
            }*/

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
        FileUtils::normalizeFile("", $this->generateLaravel(new FormTemplate), new InheritMaster(new BasicNormalization));
    }

    public function generateLaravelShowForm()
    {
        FileUtils::normalizeFile("", $this->generateLaravel(new DisplayTemplate), new InheritMaster(new BasicNormalization));
    }

    public function generateLaravelDisplaySingleElement()
    {
        FileUtils::normalizeFile("", $this->generateLaravel(new SingleDisplayTemplate), new InheritMaster(new BasicNormalization));
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