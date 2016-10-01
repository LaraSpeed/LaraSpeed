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
                ->string("titre")
                ->integer("annee")
                ->hasMany('acteur')
                ->end()
            ->table("acteur")
                ->string("nom")
                ->integer("age")
                ->belongsTo("film")
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