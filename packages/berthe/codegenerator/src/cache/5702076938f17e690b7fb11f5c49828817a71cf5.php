<?php echo e("function $tab(){ "); ?>

    <?php echo 'return $this->'.$type.'(\'App\\'.ucfirst($tab).'\''; ?><?php echo !empty($foreignKey)?(', \''.$foreignKey.'\''):''; ?><?php echo !empty($parentKey)?(', \''.$parentKey.'\''):''; ?><?php echo ');'; ?>

<?php echo e("}"); ?>

