<?php
namespace App;
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

        //Laravel Version for which the code should be generated.
        "version" => "5.3",

        //Attribute which should be displayed for each tables when needed one Attribute
        "displayAttributes" => array(
            "film" => "title",
            "language" => "name",
            "category" => "name",
            "delivery" => "identifiant",
            "users" => "name"
        ),
    );


    public function getSite(){

        $mcd = new MCD();

        $mcd->table("film")
                ->increments("film_id")
                ->smallInteger("language_id")
                ->string("title", true, 255)
                ->text("description", true)
                ->integer("release_year", true)
                ->smallInteger("original_language_id")
                ->tinyInteger("rental_duration")
                ->decimal("rental_rate", true, 4, 2)
                ->tinyInteger("length", true)
                ->decimal("replacement_cost", false, 5, 2)
                ->enum("rating", array('G', 'PG', 'PG-1', 'R', 'NC-17'))
                //This May be Set
                ->set("special_features", array('Trailers', 'Commentaries', 'Deleted Scenes', 'Behind The Scenes'))
                ->timeStamp("last_update")
                ->belongsTo("language")
                ->belongsToMany("category")
                ->end()

            ->table("language")
                ->increments("language_id")
                ->string("name", true, 20)
                ->timeStamp("last_update")
                ->hasMany("film")
                ->end()

            ->table("category")
                ->smallInteger("category_id")
                ->string("name", true, 25)
                ->timeStamp("last_update")
                ->belongsToMany("film")
                ->end()

            ->table("delivery")
                ->increments("id")
                ->string("identifiant", true)
                ->date("date", true)
                ->longText("articles", false)
                ->end();

        //Set Additional Route
        parent::setRoutes($mcd->getRoutes());
        
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