<?php $__env->startSection('constraints'); ?><?php $__currentLoopData = $tbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tabName => $table): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if(array_key_exists('relations', $table) && !empty($table['relations'])): ?>
        <?php echo 'Schema::table(\''.$tabName.'\', function(Blueprint $table) {'; ?>

<?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relationType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($relationType->hasConstraint()): ?><?php echo $__env->make($relationType->getForeignConstraintView(), ['tab' => $relationType->getOtherTable(), 'tbs' => $tbs], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

        <?php echo '});'; ?>


<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('dropTables'); ?><?php $__currentLoopData = $tbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tabName => $table): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if(array_key_exists('relations', $table) && !empty($table["relations"])): ?>
        <?php echo 'Schema::table(\''.$tabName.'\', function(Blueprint $table) {'; ?>

    <?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relationType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($relationType->hasConstraint()): ?>
            <?php echo $__env->make($relationType->getDropTableConstraintView(), ['tabName' => $tabName, 'tab' => $relationType->getOtherTable()], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

        <?php echo '});'; ?>


<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('constraintMaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>