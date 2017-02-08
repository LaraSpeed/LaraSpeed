<?php if(key_exists("relations", $table) && !empty($table["relations"])): ?><?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        S3Bif(isset($<?php echo $table['title'].'->'.$relation->getOtherTable(); ?>) && "<?php echo $relation->getOtherTable(); ?>" == $table)
            <?php echo $__env->make($relation->getDisplayView(), ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs, "config" => $config], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        S3Belse

        S3Bendif
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>