    $<?php echo "lvRole = $"."user->role;"; ?>

        $<?php echo "lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($"."lvRole);"; ?>


        if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), $<?php echo e("lvRole"); ?>, "<?php echo e($table["title"]); ?>")){

            if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), $<?php echo e("lvRole"); ?>, "<?php echo e($table["title"]); ?>")->getDroit(), "<?php echo $droit; ?>")){
                return true;
            }
        }

        return false;