<?php $__env->startSection('modelNamespace'); ?><?php echo e(ucfirst($table['title'])); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('controllerName'); ?><?php echo e(ucfirst($table['title'])."Controller"); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('viewName'); ?><?php echo e($table['title']); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('varID'); ?><?php echo e($table['title'].'s'); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('modelCall'); ?><?php echo e(ucfirst($table['title']).'::all()'); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('createView'); ?><?php echo e($table['title']); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('storeVar'); ?><?php echo e($table['title']); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('ModelName1'); ?><?php echo e(ucfirst($table['title'])); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('storeVar1'); ?><?php echo e($table['title']); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('singleView'); ?><?php echo e($table['title']); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('varID1'); ?><?php echo e($table['title']); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('modelCall1'); ?><?php echo e(ucfirst($table['title']).'::find($id)'); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('deleteCall'); ?><?php echo e(ucfirst($table['title']).'::delete($id)'); ?><?php $__env->stopSection(); ?>
<?php echo $__env->make('controllerMaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>