<?php
namespace App\in;
use Berthe\Codegenerator\Core\CallGenerator;
use Berthe\Codegenerator\Core\MCD;

/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 01/09/16
 * Time: 05:20 م
 */

class GeneratorCode  extends CallGenerator {

    public $configs = array(
        "version" => "5.1",
    );

    public function getSite(){

        $mcd = new MCD();

        $mcd->table("film")
                ->increments("film_id")
                ->smallInteger("language_id")
                ->string("title", 255)
                ->text("description")
                ->tinyInteger("release_year")
                ->smallInteger("original_language_id")
                ->tinyInteger("rental_duration")
                ->decimal("rental_rate", 4, 2)
                ->tinyInteger("length")
                ->decimal("replacement_cost", 5, 2)
                ->enum("rating", array('G', 'PG', 'PG-1', 'R', 'NC-17'))
                //This May be Set
                ->set("special_features", array('Trailers', 'Commentaries', 'Deleted Scenes', 'Behind The Scenes'))
                ->timeStamp("last_update")
                ->belongsTo("language")
                ->belongsToMany("category")
                ->end()

            ->table("language")
                ->increments("language_id")
                ->string("name", 20)
                ->timeStamp("last_update")
                ->hasMany("film")
                ->end()

            ->table("category")
                ->tinyInteger("category_id")
                ->string("name", 25)
                ->timeStamp("last_update")
                ->belongsToMany("film")
                ->end();
        
        return $mcd->getSite();
    }
}

/*$this->site = [
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
 ];*/