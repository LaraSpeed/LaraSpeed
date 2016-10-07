<?php $__env->startSection('modelNamespace'); ?><?php echo e(ucfirst($table['title'])); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('controllerName'); ?><?php echo e(ucfirst($table['title'])."Controller"); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('viewName'); ?><?php echo e($table['title']); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('varID'); ?><?php echo e($table['title'].'s'); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('modelCall'); ?><?php echo e(ucfirst($table['title']).'::all()'); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('createView'); ?><?php echo e($table['title']); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('storeVar'); ?><?php echo e($table['title']); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('ModelName1'); ?><?php echo e(ucfirst($table['title'])); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('storeVar1'); ?><?php echo e($table['title']); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('object'); ?><?php echo e(ucfirst($table['title']).' $'.$table['title']); ?> <?php $__env->stopSection(); ?>
<?php $tb = array(); ?>
<?php $__env->startSection('show'); ?><?php if(key_exists("relations", $table)): ?> <?php $__currentLoopData = $table["relations"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php $tb[] = $relation->getOtherTable() ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php echo $__env->make($relation->getActionView(), ['tab' => $relation->getTable(), 'otherTable' => $relation->getOtherTable(), 'args' => Berthe\Codegenerator\Utils\Helper::createStringArray($tb)], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make("showReturnValController", ['tab' => $relation->getTable()], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('deleteCall'); ?><?php echo e(ucfirst($table['title']).'::delete($id)'); ?><?php $__env->stopSection(); ?>
<?php echo $__env->make('controllerMaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>