<h1 class="text-danger">List of <?php echo e(ucfirst($table['title']).'s'); ?></h1>

<form action="" method="get">
    <div class="form-group">
        <label>Search : </label>
        <input  type="text" class="form-control" name="filter" placeholder="Search"/>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Search"/>
    </div>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($attrType->isDisplayable()): ?>
            <th>
                <a href="<?php echo e(url($table['title'])); ?>"><?php echo e(ucfirst($attrName)); ?></a>
            </th><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

        </tr>
    </thead>

    <tbody>
        S3Bforelse($<?php echo e($table['title'].'s'); ?> as $<?php echo e($table['title']); ?>)
            <tr>
    <?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($attrType->isDisplayable()): ?>
        <td>S2BOBRACKET$<?php echo $table['title'].'->'.$attrName; ?>S2BCBRACKET</td>
    <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <td><a href="<?php echo e($table['title'].'/'); ?>S2BOBRACKET$<?php echo $table['title'].'->'.$table['id']; ?>S2BCBRACKET">View</a></td>
        <td><a href="S2BOBRACKET<?php echo "url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"; ?>S2BCBRACKET/edit">Edit</a></td>
        <?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <td><a href="#"><?php echo ucfirst($relation->getOtherTable()); ?></a></td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tr>
        S3Bempty
            <tr>
                <td>No <?php echo e($table['title']); ?>.</td>
            </tr>
        S3Bendforelse
    </tbody>
</table>
