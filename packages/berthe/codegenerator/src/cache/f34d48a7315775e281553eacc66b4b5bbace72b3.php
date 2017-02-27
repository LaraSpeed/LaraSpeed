    <?php echo e("function $tab(){ "); ?>

        <?php echo 'return $this->'.$type.'(\'App\\'.ucfirst($tab).'\', \'App\\'.ucfirst($intermediate).'\');'; ?>

    <?php echo e("}"); ?>

