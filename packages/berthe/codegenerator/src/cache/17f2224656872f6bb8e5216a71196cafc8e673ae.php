<?php echo "request()->session()->forget(\"sortKey\");"; ?>

<?php echo "request()->session()->forget(\"sortOrder\");"; ?>

<?php echo "if(!request()->exists('tab')){"; ?>

$<?php echo $table['title'].'s = '; ?><?php echo ucfirst($table['title'])."::query();"; ?>

<?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($attrType->isDisplayable()): ?>
    <?php echo "if(request()->exists('$attrName')){"; ?>

    $<?php echo $table['title'].'s = '; ?>$<?php echo $table['title']."s->orderBy('$attrName', $"."this->getOrder('$attrName'));"; ?>

    $<?php echo 'path = '; ?><?php echo "\"$attrName\";"; ?>

    <?php echo "}else{"; ?>

    <?php echo "request()->session()->forget(\"$attrName\");"; ?>

    <?php echo "}"; ?>

<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
$<?php echo $table['title'].'s = '; ?>$<?php echo $table['title'].'s->paginate(20);'; ?>

$<?php echo $table['title']."s->setPath(\"sort?$"."path\");"; ?>

<?php echo "return view('".$table['title']."_show', compact('".$table['title']."s'));"; ?>


<?php echo "}else{"; ?>


<?php if(key_exists("relations", $table) && !empty($table["relations"])): ?><?php $__currentLoopData = $table["relations"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>  <?php echo "if(request()->exists('tab') == '".$relation->getOtherTable()."'){"; ?>


<?php $__currentLoopData = $tbs[$relation->getOtherTable()]['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($attrType->isDisplayable()): ?>
    <?php echo "if(request()->exists('$attrName')){"; ?>

    <?php echo "session(['sortOrder' => $"."this->getOrder('$attrName')]);"; ?>

    <?php echo "session(['sortKey' => '$attrName']);"; ?>

    <?php echo "}else{"; ?>

    <?php echo "request()->session()->forget(\"$attrName\");"; ?>

    <?php echo "}"; ?>


<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

<?php echo "}"; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>
<?php echo "return back();"; ?>

<?php echo "}"; ?>