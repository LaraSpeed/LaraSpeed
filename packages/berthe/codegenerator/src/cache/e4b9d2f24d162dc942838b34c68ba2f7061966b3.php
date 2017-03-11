<?php if(key_exists("relations", $table) && !empty($table["relations"])): ?><?php $__currentLoopData = $table["relations"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <?php echo $__env->make($relation->getAction(), ['tab' => $relation->getTable(), 'otherTable' => $relation->getOtherTable(), 'tbs' => $tbs], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>