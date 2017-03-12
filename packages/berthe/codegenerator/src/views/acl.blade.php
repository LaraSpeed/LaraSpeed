
namespace App;

use Berthe\Codegenerator\Core\ACL;

class ACLFactory
{
    private static $config = [

        @foreach($acl->getRoles() as $role)

            "{!! $role->getName() !!}" => [

                @foreach($role->getDomaines() as $domaine)

                    "{!! $domaine->getName() !!}" => "{!! $domaine->getDroit()->getDroit() !!}",

                @endforeach
            ],

        @endforeach
    ];

    private static $mappedDomainTable = [

        @foreach($acl->getMappedDomainTable() as $domain => $tables)

            "{!! $domain !!}"   => [
                @foreach($tables as $table) "{!! $table !!}", @endforeach
            ],

        @endforeach

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