<?php $__env->startSection("namespace"); ?><?php echo e(ucfirst($table["title"])); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection("model"); ?><?php echo e(ucfirst($table["title"])); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection("viewModelParam"); ?><?php echo e(ucfirst($table["title"])); ?> $<?php echo e("model"); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection("viewContent"); ?><?php echo $__env->make("policy.viewPolicy", ["table" => $table, "config" => $config, "acl" => $acl], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection("createModelParam"); ?><?php echo e(ucfirst($table["title"])); ?> $<?php echo e("model"); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection("createContent"); ?><?php echo $__env->make("policy.createPolicy", ["table" => $table, "config" => $config, "acl" => $acl], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection("updateModelParam"); ?><?php echo e(ucfirst($table["title"])); ?> $<?php echo e("model"); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection("updateContent"); ?><?php echo $__env->make("policy.updatePolicy", ["table" => $table, "config" => $config, "acl" => $acl], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection("deleteModelParam"); ?><?php echo e(ucfirst($table["title"])); ?> $<?php echo e("model"); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection("deleteContent"); ?><?php echo $__env->make("policy.deletePolicy", ["table" => $table, "config" => $config, "acl" => $acl], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?><?php $__env->stopSection(); ?>
<?php echo $__env->make("policyMaster", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>