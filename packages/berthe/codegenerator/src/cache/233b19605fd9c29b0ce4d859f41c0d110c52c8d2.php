<?php if(key_exists("relations", $table) && !empty($table["relations"])): ?><?php $__currentLoopData = $table["relations"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php $tb[] = $relation->getOtherTable() ?><?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php echo $__env->make($relation->getActionView(), ['tab' => $relation->getTable(), 'otherTable' => $relation->getOtherTable(), 'args' => Berthe\Codegenerator\Utils\Helper::createStringArray($tb), 'config' => $config], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo "return view('".$relation->getTable()."_related', compact(['".$relation->getTable()."', 'table']));"; ?>

<?php endif; ?>