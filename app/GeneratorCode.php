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

    public function getSite(){

        $mcd = new MCD();

        /** Todo: Define your CDM (YOU CAN LOOK AT "GeneratorCodeExample") */

        $mcd->table("YOUR_TABLE");

        //Set Additional Information
        parent::setRoutes($mcd->getRoutes());
        parent::setPivots($mcd->getPivots());
        parent::setHoverMessages($mcd->getHoversMessages());
        
        return $mcd->getSite();
    }

    public $configs = array(

        //Laravel Version for which the code should be generated.
        "version" => "5.3",

        //Attribute which should be displayed for each tables when needed one Attribute
        "displayAttributes" => array(
            "actor" => "name",
        ),

        "tablePluralForm" => array(
            "actor" => "actors",
        ),

        "sidebarIcons" => array(
            "actor" => "fa fa-play",
        ),
    );

}
