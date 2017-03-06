<?php $__env->startSection('schemaClassName'); ?><?php echo e('Create'.ucfirst($table['title']).'Table'); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('createTable'); ?><?php echo e($table['title']); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('fields'); ?><?php if(array_key_exists('attributs', $table)): ?><?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if(is_integer($attrType) or is_int($attrType)): ?><?php echo '$table->integer(\''.$attrName.'\');'; ?><?php elseif(is_string($attrType)): ?><?php echo '$table->string(\''.$attrName.'\');'; ?>

            <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('dropTable'); ?><?php echo e($table['title']); ?><?php $__env->stopSection(); ?>
<?php echo $__env->make('schemaMaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>