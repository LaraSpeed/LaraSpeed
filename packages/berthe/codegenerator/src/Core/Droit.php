<?php
/**
 * Created by PhpStorm.
 * User: minfo
 * Date: 10/03/2017
 * Time: 19:42
 */

namespace Berthe\Codegenerator\Core;


/**
 * Class Droit : Contains Droit information
 * @package Berthe\Codegenerator\Core
 */

class Droit
{
    /**
     *
     * Droit
     *
     * @var string
     */
    private $droit;

    /**
     * Droit constructor.
     *
     * @param string $droit
     */
    public function __construct($droit = "")
    {
        $this->droit = $droit;
    }

    /**
     * @return string
     */
    public function getDroit(){
        return $this->droit;
    }

    /**
     * @param string $droit
     */
    public function setDroit($droit = ""){
        $this->droit = $droit;
    }
}