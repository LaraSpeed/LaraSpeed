<?php
namespace App;

use Berthe\Codegenerator\Core\ACL;

class ACLFactory
{
    private static $config = [

        
            "USER" => [

                
                    "STOCK" => "R",

                            ],

        
            "COMPTABLE" => [

                
                    "FINANCIER" => "CRU",

                            ],

        
            "MAGASINIER" => [

                
                    "STOCK" => "CRUD",

                
                    "CLIENT" => "CRU",

                
                    "LOCATION" => "CRUD",

                            ],

        
            "GERANT" => [

                
                    "ADMIN" => "CRUD",

                            ],

            ];

    private static $mappedDomainTable = [

        
            "STOCK"   => [
                 "actor",  "film",  "language",  "category",             ],

        
            "CLIENT"   => [
                 "customer",  "rental",             ],

        
            "FINANCIER"   => [
                 "payment",             ],

        
            "LOCATION"   => [
                 "address",  "city",  "country",             ],

        
            "ADMIN"   => [
                 "store",  "staff",             ],

        
    ];


    public static function getACL(){

        $acl = new ACL();

        foreach(ACLFactory::$config as $role => $domaines){

            $acl->role($role);

            foreach($domaines as $domaine => $droit){
                $acl->domain($domaine)
                        ->droit($droit);
            }

            $acl->end();
        }

        $acl->setMappedDomainTable(ACLFactory::$mappedDomainTable);

        return $acl;
    }
}