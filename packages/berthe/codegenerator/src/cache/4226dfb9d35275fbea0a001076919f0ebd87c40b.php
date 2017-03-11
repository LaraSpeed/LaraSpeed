$<?php echo $table['title'].'s = '; ?><?php echo ucfirst($table['title'])."::where('".$table['id']."', 'like', $"."keyword)"; ?>

<?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>     <?php echo "->orWhere('$attrName', 'like', $"."keyword)"; ?>


<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php echo '->paginate(20);'; ?>


$<?php echo $table['title']."s->setPath(\"search?keyword=$"."keyword\");"; ?>

<?php echo "return view('".$table['title']."_show', compact('".$table['title']."s'));"; ?>