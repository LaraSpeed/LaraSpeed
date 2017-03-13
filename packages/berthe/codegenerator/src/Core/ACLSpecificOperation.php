<?php
/**
 * Created by PhpStorm.
 * User: minfo
 * Date: 12/03/2017
 * Time: 08:35
 */

namespace Berthe\Codegenerator\Core;


class ACLSpecificOperation
{

    /**
     * Test if the given role have access to the table name
     *
     * @param ACL $acl
     * @param string $role
     * @param string $table
     * @return bool
     */
    public static function canAccessTable(ACL $acl, $role = "", $table = ""){
        $tables = (new ACLBO($acl))->getAccessibleTables($role);
        return in_array($table, $tables);
    }

    public static function getDroit(ACL $acl, $role = "", $table = ""){

        $lvACLBo = new ACLBO($acl);

        $domaines = $lvACLBo->getDomaines($role);

        foreach ($domaines as $domaine){

            $tables = $lvACLBo->getDomainTables($domaine->getName());

            if(in_array($table, $tables)){
                return $domaine->getDroit();
            }
        }

        return "";
    }
}