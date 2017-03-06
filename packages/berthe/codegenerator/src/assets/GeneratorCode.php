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

            /** Todo 1 : Delete lines below (Example) */

            "film" => "title",
            "director" => "name",

            /** Todo 4 : Define Every table's Single Attribute to display */

        ),
    );


    public function getSite(){

        $mcd = new MCD();

        /** Todo 2 : Delete lines below  (Example) */

        $mcd->table("film")
                ->increments("id")
                ->string("title", true)
                ->longText("description")
                ->double("price", true, 4, 2)
                ->boolean("famous", false)
                ->belongsTo("director")
                ->end()

            ->table("director")
                ->increments("id")
                ->string("name", true, 50) //true => required in form
                ->date("birth")
                ->text("bio", false) //false => Not required in form
                ->hasMany("film")
                ->end();


        /** Todo 3 : Define your Conceptual Data Model Tables and Relations (Tables should be created in "alphabetical" order ) */

        //$mcd->table("...")........



        //Set Additional Route
        parent::setRoutes($mcd->getRoutes());
        
        return $mcd->getSite();
    }
}