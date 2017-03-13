<?php $__env->startSection("registerPolicies"); ?>
<?php $__currentLoopData = $tbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tableName => $table): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> '<?php echo "App\\".ucfirst($tableName)."' => 'App\\Policies\\".ucfirst($tableName)."Policy"; ?>',
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("authserviceproviderMaster", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>