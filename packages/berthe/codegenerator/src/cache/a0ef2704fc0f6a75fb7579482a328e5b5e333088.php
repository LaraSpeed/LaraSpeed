<?php $__env->startSection('typeFichier'); ?>  <?php $__env->stopSection(); ?>


<?php $__env->startSection('namespace'); ?><?php echo e('App'); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('modelName'); ?><?php echo e(ucfirst($table['title'])); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('col_id'); ?><?php echo e($table['id']); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('tableName'); ?><?php echo e($table['title']); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('attributs'); ?><?php if(array_key_exists('attributs', $table)): ?><?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrVal): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php echo "\"$attrName\", "; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('relations'); ?><?php if(array_key_exists('relations', $table)): ?><?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relationType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
<?php echo $__env->make($relationType->getModelView(), ["type" => $relationType->getType(), "tab" => $relationType->getOtherTable()], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('accessors'); ?><?php if(array_key_exists('attributs', $table)): ?><?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($attrType->isDisplayable()): ?><?php echo $__env->make($attrType->mutator(), ['attrName' => $attrName, 'length' => 40], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>

<?php if(array_key_exists('relations', $table)): ?><?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relationType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <?php echo $__env->make($relationType->getRelationAccessor(), ["table" => $relationType->getTable(), "otherTable" => $relationType->getOtherTable(), "config" => $config, "tbs" => $tbs], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('modelMaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>