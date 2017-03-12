<?php
/**
 * Created by PhpStorm.
 * User: minfo
 * Date: 10/03/2017
 * Time: 19:30
 */

namespace Berthe\Codegenerator\Core;


use Berthe\Codegenerator\Contrats\IACLDSL;
use Berthe\Codegenerator\Core\Role;
use Berthe\Codegenerator\Core\Domaine;
use Berthe\Codegenerator\Core\Droit;



class ACL implements IACLDSL
{
    /**
     *
     * ACL Roles
     *
     * @var array
     */
    private $roles;

    /**
     * @var Role
     */
    private $currentRole;

    /**
     * @var Domaine
     */
    private $currentDomain;


    /**
     * @var Droit
     */
    private $currentDroit;

    /**
     *  Mapping between Domain & tables in the domain
     * @var array
     */
    private $mappedDomainsTable;


    /**
     * ACL constructor.
     * @param array $roles
     */
    public function __construct($roles = array())
    {
        $this->roles = $roles;
    }

    /**
     * Get ACL Roles
     *
     * @return array
     */
    public function getRoles(){
        return $this->roles;
    }

    /**
     * Set ACL roles
     *
     * @param array $roles
     */
    public function setRoles($roles = array()){
        $this->roles = $roles;
    }

    /**
     * @param Role $role
     */
    private function addRole(Role $role){
        $this->roles[] = $role;
    }

    /**
     * Create new  Role
     *
     * @param string $name
     * @return $this
     */
    public function role($name = "")
    {
        $this->currentRole = new Role($name);

        return $this;
    }

    /**
     * Create new Domain
     *
     * @param string $name
     * @return $this
     */
    public function domain($name = "")
    {
        $this->currentDomain = new Domaine($name);

        return $this;
    }

    /**
     * Create new Droit
     *
     * @param string $name
     * @return $this
     */
    public function droit($name = "")
    {
        $this->currentDomain->setDroit(new Droit($name));
        $this->currentRole->addDomaine($this->currentDomain);

        return $this;
    }

    /**
     * End of a role
     *
     * @return $this
     */
    public function end()
    {
        $this->addRole($this->currentRole);

        return $this;
    }

    /**
     * Get Mapping Domains => tables
     *
     * @param array $mappedDomainTable
     */
    public function setMappedDomainTable($mappedDomainTable = array()){
        $this->mappedDomainsTable = $mappedDomainTable;
    }


    /**
     * Set the Mapping between Table 
     *
     * @return array
     */
    public function getMappedDomainTable(){
        return $this->mappedDomainsTable;
    }

}