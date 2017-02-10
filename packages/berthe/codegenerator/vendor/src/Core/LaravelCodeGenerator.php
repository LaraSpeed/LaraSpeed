<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 01/09/16
 * Time: 09:40 ص
 */
namespace Berthe\Codegenerator\Core;

use Berthe\Codegenerator\Utils\TemplateProvider;
use Berthe\Codegenerator\Contrats\ILaravelCodeGenerator;


class LaravelCodeGenerator implements ILaravelCodeGenerator
{
    private $mda;


    public function __construct($table = array())
    {
        $this->mda = $table;

        //Creating Master File. (=== Not Optimale But working Fine ===).
        $p = base_path('resources/views/')."master.blade.php";
        $content = file_get_contents(__DIR__ . '/../views/formMaster.blade.php');
        file_put_contents($p, $content);
        //chmod($p, 0777);
    }

    /**
     * Helper function used to prepend String to a file.
     * @param $toPrepend
     * @param $paths
     */
    private function prependStringToFile($toPrepend, $paths){
        foreach ($paths as $path){
            $content = file_get_contents($path);

            //Normalize Code
            $content = str_replace('S3B', '@', $content);
            file_put_contents($path, "$toPrepend".$content);
            chmod($path, 0777);

            //Adding Blade Template thing if it is a view.
            if(str_contains($path, "resources/views")){
                $this->singlePrependStringToFile("@extends('master')\n@section('content')\n", $path);
                $this->singleAppendStringToFile("@endsection", $path);
            }
        }
    }

    /**
     * Prepends String to file.
     * @param $toPrepend
     * @param $path
     */
    private function singlePrependStringToFile($toPrepend, $path){
        $content = file_get_contents($path);
        file_put_contents($path, "$toPrepend".$content);
        chmod($path, 0777);
    }

    /**
     * Appends String to file.
     * @param $toAppend
     * @param $path
     */
    private function singleAppendStringToFile($toAppend, $path){
        $content = file_get_contents($path);
        file_put_contents($path, $content."$toAppend");
        chmod($path, 0777);
    }

    /**
     * Function generating a view Based on it name
     * @param string $template
     * @param string $outdir
     * @return $this
     */
    function generateLaravel($template = "form", $outdir = "form")
    {
        foreach($this->mda as $tableName => $table){
            $table['title'] = $tableName;
            $fileGenerator = new FileGenerator(TemplateProvider::getTemplate($template), ["table" => $table]);

            //Because Schema have particular name, we have to specify that.
            if($template == "schema"){
                $path = base_path($outdir).'/20'.date('y_m_0j_his').'_create_'.$tableName.'_table.php';
            }else if($template == "controller"){
                $path = base_path($outdir).'/'.ucfirst($tableName).'Controller.php';
            }else if($template == "model"){
                $path = base_path($outdir).'/'.ucfirst($tableName).'.php';
            }else if($template == "show"){
                $path = base_path($outdir).'/'.$tableName.'_show.blade.php';
            }else{
                $path = base_path($outdir).'/'.$tableName.'.blade.php';

                //Adding Route to routes/Web.php
                $toAppends = TemplateProvider::getResourceRouteTemplate($tableName, ucfirst($tableName).'Controller')."\n";
                $content = file_get_contents(base_path('routes/').'web.php');
                //Teste if route don't already exist
                if(!str_contains($content, $toAppends)){
                    $this->singleAppendStringToFile(
                        $toAppends,
                        base_path('routes/web.php')
                    );
                }
            }

            $fileGenerator->put($path);

            //Change Dir Right.
            chmod($path, 0777);

            //if(in_array($template, array("model", "schema", "controller")))
            yield $path;
        }
    }

    /**
     * Function generate a Model php files for the given MCD
     */
    function generateLaravelModel()
    {
        $this->prependStringToFile("<?php \n", $this->generateLaravel("model", "app"));
    }

    /**
     * Function generating Schema php files for the given MCD
     */
    function generateLaravelSchema()
    {
        $this->prependStringToFile("<?php \n", $this->generateLaravel("schema", "database/migrations"));
    }

    /**
     * Function generating Controller php files for the given MCD.
     */
    function generateLaravelController()
    {
        $this->prependStringToFile("<?php \n", $this->generateLaravel("controller", "app/Http/Controllers"));
    }

    /**
     * generating Form .blade.php files for the given MCD
     */
    function generateLaravelForm()
    {
        $this->prependStringToFile("", $this->generateLaravel("form", "resources/views"));
    }

    /**
     * Generate Shown Form.
     */
    public function generateLaravelShowForm()
    {
        $this->prependStringToFile("", $this->generateLaravel("show", "resources/views"));
    }

    /**
     * Generate
     * @param string $template
     * @param string $outdir
     */
    public function generateLaravelSchemaConstraint($template = "constraints", $outdir ="")
    {
        $tbs = $this->mda;
        $fileGenerator = new FileGenerator(TemplateProvider::getTemplate($template), ["tbs" => $tbs]);
        $path = base_path($outdir).'/20'.date('y_m_0j_his').'_create_foreign_keys.php';
        $fileGenerator->put($path);
        chmod($path, 0777);
        $this->singlePrependStringToFile("<?php \n", $path);
    }

    /**
     * Funcion generating the Files dynamically based on a Given param
     *
     * @param string $type : Allowed => Form, Model, Schema and Controller.
     */
    public function generate($type = "Form")
    {
        echo "Generate ".$type." started !\n";
        $generateMethod = "generateLaravel".$type;
        $this->$generateMethod();
        echo "Generate ".$type." finished !\n";
    }

}