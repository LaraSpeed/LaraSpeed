<?php 
namespace Berthe\CodeGenerator;

use App\Http\Controllers\Controller;
use Berthe\CodeGenerator\FileGenerator;

class CodeGeneratorController extends Controller
{

    public function index()
    {
		$tables = [
			//Table Film
			"film" => [
						"attributs" => ["titre" => "", "annee" => 0],
						"relations" => ["hasMany" => ["acteur"]],
					],
			//Table Acteur
			"acteur" => [
				"attributs" => ["nom" => "", "age" => 0],
				"relations" => ["belongsTo" => ["film"]],
				],
	 	];
	//Template used to generate Form
	$template = __dir__.'/views/form';
	
	foreach($tables as $tableName => $table){
		$table['title'] = $tableName;
		$fileGenerator = new FileGenerator($template, ["table" => $table]);
		$fileGenerator->put(base_path('out').'/'.$tableName.'.php');
	}
	
	return "Finished Generation : Chech the Directory <out> of the route folder";
	
   }

}
