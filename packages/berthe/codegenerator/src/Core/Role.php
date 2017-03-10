<?php
/**
 * Created by PhpStorm.
 * User: minfo
 * Date: 10/03/2017
 * Time: 19:51
 */

namespace Berthe\Codegenerator\Core;

use Berthe\Codegenerator\Core\Domaine;

/**
 * Class Role
 * @package Berthe\Codegenerator\Core
 */
class Role
{
    /**
     * Role name
     *
     * @var string
     */
    private $name;

    /**
     * Role 's domaines
     *
     * @var array
     */
    private $domaines;

    /**
     * Role constructor.
     * @param string $name
     * @param array $domaines
     */
    public function __construct($name = "", $domaines = array())
    {
        $this->name = $name;
        $this->domaines = $domaines;
    }

    /**
     * Get Role name
     *
     * @return string
     */
    public function getName(){
        return $this->name;
    }

    /**
     * Set Role name
     *
     * @param string $name
     */
    public function setName($name = ""){
        $this->name = $name;
    }

    /**
     * Get Role's domaines
     *
     * @return array
     */
    public function getDomaines(){
        return $this->domaines;
    }

    /**
     * Set Role Domaines
     *
     * @param array $domaines
     */
    public function setDomaines($domaines = array()){
        $this->domaines = $domaines;
    }

    /**
     * Add domainto Role
     *
     * @param Domaine $domain
     */
    public function addDomaine(Domaine $domain){
        $this->domaines[] = $domain;
    }



}