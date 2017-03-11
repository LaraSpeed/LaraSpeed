<?php if(array_key_exists('attributs', $table)): ?><?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($attrType->isDisplayable()): ?><?php echo $__env->make($attrType->mutator(), ['attrName' => $attrName, 'length' => 40], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>

<?php if(array_key_exists('relations', $table) && !empty($table["relations"])): ?><?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relationType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <?php echo $__env->make($relationType->getRelationAccessor(), ["table" => $relationType->getTable(), "otherTable" => $relationType->getOtherTable(), "config" => $config, "tbs" => $tbs], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>