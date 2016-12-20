    <?php echo e("function $tab(){ "); ?>

        <?php echo 'return $this->'.$type.'(\'App\\'.ucfirst($tab).'\');'; ?>

    <?php echo e("}"); ?>

