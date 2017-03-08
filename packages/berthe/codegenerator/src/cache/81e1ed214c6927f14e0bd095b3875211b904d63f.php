$<?php echo "data = request()->all();"; ?>


$<?php echo "updateFields = array();"; ?>

<?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($attrType->isDisplayable()): ?><?php if(!$attrType->isBoolean()): ?>
    $<?php echo "updateFields["."\"$attrName\"] = $"."data[\"$attrName\"];"; ?>

<?php else: ?>
    $<?php echo "updateFields["."\"$attrName\"] = $"."data[\"$attrName\"] == \"on\"?1:0;"; ?>

<?php endif; ?> <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

$<?php echo $table['title']."->update($"."updateFields);"; ?>


<?php if(key_exists("relations", $table) && !empty($table["relations"])): ?><?php $__currentLoopData = $table["relations"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($relation->isBelongsTo()): ?>
    <?php echo "if(request()->exists('".$relation->getOtherTable()."')){"; ?>

    $<?php echo $relation->getOtherTable()." = "; ?><?php echo "\\App\\".ucfirst($relation->getOtherTable())."::find(request()->get('".$relation->getOtherTable()."'));"; ?>

    $<?php echo $table["title"]."->".$relation->getOtherTable()."()->associate($".$relation->getOtherTable().")->save();"; ?>

    <?php echo "}"; ?>


<?php elseif($relation->isBelongsToMany()): ?>
    <?php echo "if(request()->exists('".$relation->getOtherTable()."')){"; ?>

    $<?php echo $table["title"]."->".$relation->getOtherTable()."()->sync(request()->get('".$relation->getOtherTable()."'));"; ?>

    <?php echo "}"; ?>


<?php elseif($relation->isHasMany()): ?>
    <?php echo "if(request()->exists('".$relation->getOtherTable()."')){"; ?>


    $<?php echo "newOnes = \\App\\".ucfirst($relation->getOtherTable())."::find(request()->get('".$relation->getOtherTable()."'));"; ?>


    <?php echo "foreach ($"."newOnes as $"."newOne){"; ?>

    $<?php echo $table["title"]."->".$relation->getOtherTable()."()->save($"."newOne);"; ?>

    <?php echo "}"; ?>


    <?php echo "}"; ?>

<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>


