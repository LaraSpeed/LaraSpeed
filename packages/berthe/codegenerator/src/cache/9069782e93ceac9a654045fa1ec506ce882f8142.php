<?php if(array_key_exists('attributs', $table)): ?><?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrVal): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php echo "\"$attrName\", "; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>