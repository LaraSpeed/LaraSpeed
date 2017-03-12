
namespace App;

use Berthe\Codegenerator\Core\ACL;

class ACLFactory
{
    private static $config = [

        <?php $__currentLoopData = $acl->getRoles(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

            "<?php echo $role->getName(); ?>" => [

                <?php $__currentLoopData = $role->getDomaines(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $domaine): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                    "<?php echo $domaine->getName(); ?>" => "<?php echo $domaine->getDroit()->getDroit(); ?>",

                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            ],

        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    ];

    private static $mappedDomainTable = [

        <?php $__currentLoopData = $acl->getMappedDomainTable(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $domain => $tables): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

            "<?php echo $domain; ?>"   => [
                <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> "<?php echo $table; ?>", <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            ],

        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

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