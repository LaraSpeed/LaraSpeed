<h1 class="text-danger">Edit <?php echo e(ucfirst($table['title'])); ?></h1>
<form method="post" action="S2BOBRACKET<?php echo "url(\"".$table['title']."/$".$table['title']."->".$table['id']."\")"; ?>S2BCBRACKET">
    <?php echo e(method_field('PUT')); ?>

    <input type="hidden" name="_token" value="S2BOBRACKET csrf_token() S2BCBRACKET" />
<?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($attrType->isDisplayable()): ?> <div class="form-group">
        <label class="text-danger"><?php echo e(ucfirst(str_replace("_", " ", $attrName))); ?> : </label>
        <?php echo $attrType->getForm("S2BOBRACKET$".$table['title'].'->'.$attrName."S2BCBRACKET"); ?>

    </div>

<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Update" />
    </div>
</form>

<?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <?php echo $__env->make($relation->getEditView(), ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs, "config" => $config], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>