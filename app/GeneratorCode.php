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
            "actor" => "first_name",
            "film" => "title",
            "language" => "name",
            "category" => "name",
            "delivery" => "identifiant",
            "users" => "name"
        ),

        "sidebarIcons" => array(
            "actor" => "fa fa-play",
            "film" => "fa fa-film",
            "language" => "fa fa-language",
            "category" => "fa fa-tags",
            "delivery" => "fa fa-gift",
            "users" => "fa fa-user"
        ),
    );


    public function getSite(){

        $mcd = new MCD();

        $mcd->table("actor")
                ->smallInteger("actor_id", true)
                ->string("first_name", 30, true)
                ->string("last_name", 30, true)
                ->timeStamp("last_update")
                ->belongsToMany("film")
                ->end()

            ->table("film")
                ->increments("film_id")
                ->smallInteger("language_id")
                ->string("title", 255, true, true)
                ->text("description", true, true)
                ->integer("release_year", true, true)
                ->smallInteger("original_language_id")
                ->tinyInteger("rental_duration")
                ->decimal("rental_rate", 4, 2, true, true)
                ->tinyInteger("length", true, true)
                ->decimal("replacement_cost", 5, 2, false, false)
                ->enum("rating", array('G', 'PG', 'PG-1', 'R', 'NC-17'))
                //This May be Set
                ->set("special_features", array('Trailers', 'Commentaries', 'Deleted Scenes', 'Behind The Scenes'))
                ->timeStamp("last_update")
                ->belongsTo("language")
                ->belongsToMany("category")
                ->belongsToMany("actor")
                ->end()

            ->table("language")
                ->increments("language_id")
                ->string("name", 20, true)
                ->timeStamp("last_update")
                ->hasMany("film")
                ->end()

            ->table("category")
                ->smallInteger("category_id")
                ->string("name", 25, true)
                ->timeStamp("last_update")
                ->belongsToMany("film")
                ->end()

            ->table("delivery")
                ->increments("id")
                ->string("identifiant", 25, true)
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