<?php
/**
 * Created by PhpStorm.
 * User: minfo
 * Date: 12/03/2017
 * Time: 08:39
 */

namespace Berthe\Codegenerator\Core;

use Berthe\Codegenerator\Core\ACL;

class ACLBO
{
    /**
     * ACL Object
     *
     * @var \Berthe\Codegenerator\Core\ACL
     */
    private $acl;

    public function __construct(ACL $acl)
    {
        $this->acl = $acl;
    }


    /**
     * Get Domaines assocaited to the given role
     *
     * @param string $roleName
     * @return array
     */
    public function getDomaines($roleName = ""){

        $domaines = array();

        foreach ($this->acl->getRoles() as $role){

            if($role->getName() === $roleName){
                $domaines =  $role->getDomaines();
                break;
            }
        }

        return $domaines;
    }

    /**
     *
     *  Get List of table accessible by the given role name
     *
     * @param string $roleName
     * @return array
     */
    public function getAccessibleTables($roleName = ""){

        $tables = array();
        $domaines = $this->getDomaines($roleName);
        foreach ($domaines as $domaine){
            $tables = array_merge($tables, $this->getDomainTables($domaine->getName()));
        }

        return $tables;
    }

    /**
     *
     * Get Tables associated to a given domain name
     *
     * @param $domaineName
     * @return array
     */
    public function getDomainTables($domaineName){

        if(key_exists($domaineName, $this->acl->getMappedDomainTable()))
            return $this->acl->getMappedDomainTable()[$domaineName];

        return array();
    }
}