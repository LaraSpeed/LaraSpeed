<?php $__env->startSection('constraints'); ?> <?php $__currentLoopData = $tbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tabName => $table): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if(array_key_exists('relations', $table)): ?><?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relationType => $tables): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($relationType == "belongsTo"): ?>
<?php echo 'Schema::table(\''.$tabName.'\', function(Blueprint $table) {'; ?>

            <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php echo '$table->integer(\''.$tab.'_id\')->unsigned()->index();'; ?>

            <?php echo '$table->foreign(\''.$tab.'_id\')->references(\'id\')->on(\''.$tab.'\')->onDelete(\'cascade\')->onUpdate(\'cascade\');'; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
         <?php echo '});'; ?>

<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('dropTables'); ?> <?php $__currentLoopData = $tbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tabName => $table): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if(array_key_exists('relations', $table)): ?><?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relationType => $tables): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($relationType == "belongsTo"): ?><?php echo 'Schema::table(\''.$tabName.'\', function(Blueprint $table) {'; ?>

    <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>       <?php echo '$table->dropForeign(\''.$tabName.'_'.$tab.'_id_foreign\');'; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php echo '});'; ?>

<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('constraintMaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>