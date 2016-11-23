<h1 class="text-danger">Display <?php echo e(ucfirst($table['title'])); ?></h1>

<a href="S2BOBRACKET<?php echo "url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"; ?>S2BCBRACKET/edit">Edit</a></br>

<?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($attrType->isDisplayable()): ?>
<label class="text-primary"><?php echo e(ucfirst($attrName)); ?> : </label>
<p>S2BOBRACKET$<?php echo $table['title'].'->'.$attrName; ?>S2BCBRACKET</p>
<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

<?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    S3Bif(isset($<?php echo $table['title'].'->'.$relation->getOtherTable(); ?>))
    <?php echo $__env->make(/*$relation->getDisplayView()*/"mockup", ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    S3Belse
        <label class="text-danger">No <?php echo e($relation->getOtherTable()); ?> related to this <?php echo e($relation->getTable()); ?>.</label>
    S3Bendif
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>