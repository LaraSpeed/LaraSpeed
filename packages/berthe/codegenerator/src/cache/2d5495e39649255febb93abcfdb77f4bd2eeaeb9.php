<?php $__env->startSection('modelNamespace'); ?><?php echo e(ucfirst($table['title'])); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('namespaces'); ?>
    <?php if(key_exists("relations", $table) && !empty($table["relations"])): ?><?php $__currentLoopData = $table["relations"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php echo "use App\\".ucfirst($relation->getOtherTable()).";"; ?>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('controllerName'); ?><?php echo e(ucfirst($table['title'])."Controller"); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('viewName'); ?><?php echo e($table['title']); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('varID'); ?><?php echo e($table['title'].'s'); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('modelCall'); ?><?php echo ucfirst($table['title']).'::paginate(20)'; ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('createView'); ?> <?php echo $__env->make("controllers.create.createAction", ["table" => $table], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('storeContent'); ?> <?php echo $__env->make("controllers.store.storeActionContent", ["table" => $table], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('store'); ?> <?php echo $__env->make("controllers.store.storeActionReturnValue", ["table" => $table], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('object'); ?> <?php echo $__env->make("controllers.show.showActionParam", ["table" => $table], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>
<?php $tb = array(); ?>
<?php $__env->startSection('show'); ?> <?php echo $__env->make("controllers.show.showActionContent", ["table" => $table], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('editParam'); ?> <?php echo $__env->make("controllers.edit.editActionParam", ["table" => $table], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>
<?php $tb = array(); ?>
<?php $__env->startSection('edit'); ?> <?php echo $__env->make("controllers.edit.editActionContent", ["table" => $table], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('updateParam'); ?> <?php echo $__env->make("controllers.update.updateActionParam", ["table" => $table], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('update'); ?> <?php echo $__env->make("controllers.update.updateActionContent", ["table" => $table], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('deleteParam'); ?> <?php echo $__env->make("controllers.delete.deleteActionParam", ["table" => $table], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('delete'); ?> <?php echo $__env->make("controllers.delete.deleteActionContent", ["table" => $table], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('relatedParam'); ?> <?php echo $__env->make("controllers.related.relatedActionParam", ["table" => $table], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>
<?php $tb = array(); ?>
<?php $__env->startSection('related'); ?> <?php echo $__env->make("controllers.related.relatedActionContent", ["table" => $table, "config" => $config], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('search'); ?> <?php echo $__env->make("controllers.search.searchContent", ["table" => $table], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('sort'); ?> <?php echo $__env->make("controllers.sort.sortActionContent", ["table" => $table, "config" => $config], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('relations'); ?> <?php echo $__env->make("controllers.relations.relationActionsContent", ["table" => $table, "config" => $config], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php $__env->stopSection(); ?>

<?php echo $__env->make('controllerMaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>