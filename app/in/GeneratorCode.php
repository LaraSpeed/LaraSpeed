<?php
namespace App\in;
use Berthe\Codegenerator\CallGenerator;
use Berthe\Codegenerator\MCD;

/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 01/09/16
 * Time: 05:20 م
 */

class GeneratorCode  extends CallGenerator {

    public function getSite(){

        $mcd = new MCD();
        $mcd->table("film")
            ->increments("film_id")
            ->string("title", 255)
            ->text("description")
            ->char("release_year", 4)
            ->tinyInteger("original_language_id")
            ->tinyInteger("rental_duration")
            ->decimal("rental_rate", 4, 2)
            ->smallInteger("length")
            ->decimal("replacement_cost", 5, 2)
            ->enum("rating", array('G', 'PG', 'PG-1', 'R', 'NC-17'))
            ->set("special_features", array('Trailers', 'Commentaries', 'Deleted Scenes', 'Behind The Scenes'))
            ->timeStamp("last_update")
            ->belongsTo("language")
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