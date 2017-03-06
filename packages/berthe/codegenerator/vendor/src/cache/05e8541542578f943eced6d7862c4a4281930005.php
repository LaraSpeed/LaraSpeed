<h3 class="text-danger"><?php echo e(ucfirst($otherTable)); ?> : </h3>
<?php $__currentLoopData = $tbs[$otherTable]['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($attrType->isDisplayable()): ?>
    S2BOBRACKET$<?php echo "$tab->$otherTable->$attrName"; ?>S2BCBRACKET
<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>