<?php $__env->startSection('typeFichier'); ?>  <?php $__env->stopSection(); ?>


<?php $__env->startSection('namespace'); ?> <?php echo $__env->make("models.namespaces", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('modelName'); ?> <?php echo $__env->make("models.name", ["table" => $table], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('col_id'); ?><?php echo $__env->make("models.id", ["table" => $table], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('tableName'); ?><?php echo $__env->make("models.table", ["table" => $table], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('attributs'); ?> <?php echo $__env->make("models.attributs", ["table" => $table], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('relations'); ?> <?php echo $__env->make("models.relations", ["table" => $table], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('accessors'); ?> <?php echo $__env->make("models.accessors", ["table" => $table, "config" => $config], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>

<?php echo $__env->make('modelMaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>