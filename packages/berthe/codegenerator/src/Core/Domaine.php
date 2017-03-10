<?php
/**
 * Created by PhpStorm.
 * User: minfo
 * Date: 10/03/2017
 * Time: 19:40
 */

namespace Berthe\Codegenerator\Core;

use Berthe\Codegenerator\Core\Droit;

/**
 * Class Domain
 * @package Berthe\Codegenerator\Core
 */
class Domaine
{
    /**
     *
     * Domain name
     *
     * @var string
     */
    private $name;

    /**
     * @var Droit
     */
    private $droit;


    /**
     * Domain constructor.
     * @param string $name
     */
    public function __construct($name = ""){

        $this->name = $name;
        $this->droit = new Droit("");
    }

    /**
     * Get Domain name
     *
     * @return string
     */
    public function getName(){
        return $this->name;
    }

    /**
     * Set Domain Name
     *
     * @param string $name
     */
    public function setName($name = ""){
        $this->name = $name;
    }

    /**
     * Get Domain Droit
     *
     * @return Droit|null
     */
    public function getDroit(){
        return $this->droit;
    }

    /**
     * Set Domain Droit
     *
     * @param Droit $droit
     */
    public function setDroit(Droit $droit){
        $this->droit->setDroit($droit->getDroit());
    }

}