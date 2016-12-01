<?php $__env->startSection('modelNamespace'); ?><?php echo e(ucfirst($table['title'])); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('namespaces'); ?>
    <?php if(key_exists("relations", $table)): ?><?php $__currentLoopData = $table["relations"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php echo "use App\\".ucfirst($relation->getOtherTable()).";"; ?>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('controllerName'); ?><?php echo e(ucfirst($table['title'])."Controller"); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('viewName'); ?><?php echo e($table['title']); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('varID'); ?><?php echo e($table['title'].'s'); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('modelCall'); ?><?php echo ucfirst($table['title']).'::paginate(20)'; ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('createView'); ?><?php echo e($table['title']); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('storeContent'); ?>
    $<?php echo "data = request()->all();"; ?>


    $<?php echo $table['title']." = "; ?><?php echo ucfirst($table['title'])."::create(["; ?>

    <?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($attrType->isDisplayable()): ?>
        <?php echo "\"$attrName\" => $"."data[\"$attrName\"],"; ?>

    <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php echo "]);"; ?>


    <?php if(key_exists("relations", $table)): ?><?php $__currentLoopData = $table["relations"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($relation->isBelongsTo()): ?>
        <?php echo "if(request()->exists('".$relation->getOtherTable()."')){"; ?>

            $<?php echo $relation->getOtherTable()." = "; ?><?php echo ucfirst($relation->getOtherTable())."::find(request()->get('".$relation->getOtherTable()."'));"; ?>

            $<?php echo $table['title']."->".$relation->getOtherTable()."()->associate($".$relation->getOtherTable().")->save();"; ?>

        <?php echo "}"; ?>

    <?php elseif($relation->isBelongsToMany()): ?>
        <?php echo "if(request()->exists('".$relation->getOtherTable()."')){"; ?>

        $<?php echo $table['title']."->".$relation->getOtherTable()."()->attach($"."data[\"".$relation->getOtherTable()."\"]);"; ?>

        <?php echo "}"; ?>

    <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('store'); ?><?php echo "redirect('/".$table['title']."');"; ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('object'); ?><?php echo e(ucfirst($table['title']).' $'.$table['title']); ?> <?php $__env->stopSection(); ?>
<?php $tb = array(); ?>
<?php $__env->startSection('show'); ?><?php if(key_exists("relations", $table)): ?><?php $__currentLoopData = $table["relations"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php $tb[] = $relation->getOtherTable() ?><?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php echo $__env->make($relation->getActionView(), ['tab' => $relation->getTable(), 'otherTable' => $relation->getOtherTable(), 'args' => Berthe\Codegenerator\Utils\Helper::createStringArray($tb)], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->make("showReturnValController", ['tab' => $relation->getTable(), "type" => "display"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('editParam'); ?><?php echo e(ucfirst($table['title']).' $'.$table['title']); ?> <?php $__env->stopSection(); ?>
<?php $tb = array(); ?>
<?php $__env->startSection('edit'); ?><?php if(key_exists("relations", $table)): ?><?php $__currentLoopData = $table["relations"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php $tb[] = $relation->getOtherTable() ?><?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php echo $__env->make($relation->getActionView(), ['tab' => $relation->getTable(), 'otherTable' => $relation->getOtherTable(), 'args' => Berthe\Codegenerator\Utils\Helper::createStringArray($tb)], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->make("showReturnValController", ['tab' => $relation->getTable(), "type" => "edit"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('updateParam'); ?><?php echo e(ucfirst($table['title']).' $'.$table['title']); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('update'); ?>
    $<?php echo $table['title']."->update(request()->all());"; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('deleteParam'); ?><?php echo e(ucfirst($table['title']).' $'.$table['title']); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('delete'); ?>
    $<?php echo $table['title']."->delete();"; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('relatedParam'); ?><?php echo e(ucfirst($table['title']).' $'.$table['title']); ?> <?php $__env->stopSection(); ?>
<?php $tb = array(); ?>
<?php $__env->startSection('related'); ?><?php if(key_exists("relations", $table)): ?><?php $__currentLoopData = $table["relations"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php $tb[] = $relation->getOtherTable() ?><?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php echo $__env->make($relation->getActionView(), ['tab' => $relation->getTable(), 'otherTable' => $relation->getOtherTable(), 'args' => Berthe\Codegenerator\Utils\Helper::createStringArray($tb), 'config' => $config], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo "return view('".$relation->getTable()."_related', compact(['".$relation->getTable()."', 'table']));"; ?>

<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('search'); ?>
$<?php echo $table['title'].'s = '; ?><?php echo ucfirst($table['title'])."::where('".$table['id']."', 'like', $"."keyword)"; ?>

    <?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>     <?php echo "->orWhere('$attrName', 'like', $"."keyword)"; ?>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php echo '->paginate(20);'; ?>

    $<?php echo $table['title']."s->setPath(\"search?keyword=$"."keyword\");"; ?>

    <?php echo "return view('".$table['title']."_show', compact('".$table['title']."s'));"; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sort'); ?>
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


    <?php if(key_exists("relations", $table)): ?><?php $__currentLoopData = $table["relations"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php echo "if(request()->exists('tab') == '".$relation->getOtherTable()."'){"; ?>


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

<?php $__env->stopSection(); ?>


<?php $__env->startSection('relations'); ?><?php if(key_exists("relations", $table)): ?><?php $__currentLoopData = $table["relations"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
<?php echo $__env->make($relation->getAction(), ['tab' => $relation->getTable(), 'otherTable' => $relation->getOtherTable(), 'tbs' => $tbs], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('controllerMaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>