<h1>Affichage <?php echo e($table['title']); ?></h1>

<?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($attrType->isDisplayable()): ?>
<label class="text-danger"><?php echo e(ucfirst($attrName)); ?> : </label>
<p>S2BOBRACKET$<?php echo $table['title'].'->'.$attrName; ?>S2BCBRACKET</p>
<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

<?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>