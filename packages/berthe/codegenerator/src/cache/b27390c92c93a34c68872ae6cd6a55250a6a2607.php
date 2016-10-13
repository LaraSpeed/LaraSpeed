<h1 class="text-danger">List of <?php echo e(ucfirst($otherTable).'s'); ?></h1>
<table class="table">
    <thead>
    <?php $__currentLoopData = $tbs[$otherTable]["attributs"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($attrType->isDisplayable()): ?>
        <th><?php echo ucfirst($attrName); ?></th>
    <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </thead>
S3Bforelse($<?php echo "$tab->$otherTable as "; ?> $<?php echo "$otherTable"; ?>)
    <tbody>
    <?php $__currentLoopData = $tbs[$otherTable]["attributs"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($attrType->isDisplayable()): ?>
        <td>S2BOBRACKET$<?php echo "$otherTable->$attrName"; ?>S2BCBRACKET</td>
    <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </tbody>
S3Bempty
    <td>No <?php echo e($otherTable); ?> for <?php echo e($tab); ?></td>
S3Bendforelse
</table>