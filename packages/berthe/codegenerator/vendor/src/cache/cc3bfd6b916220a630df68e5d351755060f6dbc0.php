<h1>Liste des <?php echo e(ucfirst($table['title'])); ?></h1>
<table class="table table-striped">
    <thead>
        <tr><?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

            <th>
                <a href="<?php echo e(url('/')); ?>"><?php echo e(ucfirst($attrName)); ?></a>
            </th><?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

        </tr>
    </thead>

    <tbody>
        S3Bforelse($<?php echo e($table['title'].'s'); ?> as $<?php echo e($table['title']); ?>)
            <tr>
    <?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <td>$<?php echo $table['title'].'->'.$attrName; ?></td>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </tr>
        S3Bempty
            <tr>
                <td>No <?php echo e($table['title']); ?>.</td>
            </tr>
        S3Bendforelse
    </tbody>
</table>
