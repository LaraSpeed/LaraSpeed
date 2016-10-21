<h3>Add <?php echo e(ucfirst($otherTable)); ?></h3>
<form action="" method="post">
    <input type="hidden" name="_token" value="S2BOBRACKET csrf_token() S2BCBRACKET" />
    <select class="form-control" name="<?php echo e($otherTable); ?>">
        S3Bforelse(<?php echo "\\App\\".ucfirst($otherTable)."::all() as "; ?> $<?php echo "$otherTable"; ?>)
        <option value="S2BOBRACKET$<?php echo "$otherTable->".$tbs[$otherTable]["id"]; ?>S2BCBRACKET">
        <?php $__currentLoopData = $tbs[$otherTable]["attributs"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($attrType->isDisplayable()): ?>
            S2BOBRACKET$<?php echo "$otherTable->$attrName"; ?>S2BCBRACKET
        <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </option>
        S3Bempty
        <option value="-1">No <?php echo e($otherTable); ?></option>
        S3Bendforelse
    </select>

    <input type="submit"  class="btn btn-primary" value="Add"/>
</form>