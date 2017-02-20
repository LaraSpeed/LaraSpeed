$<?php echo "data = request()->all();"; ?>


$<?php echo $table['title']." = "; ?><?php echo ucfirst($table['title'])."::create(["; ?>

<?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($attrType->isDisplayable()): ?><?php if(!$attrType->isBoolean()): ?>
    <?php echo "\"$attrName\" => $"."data[\"$attrName\"],"; ?>

<?php else: ?> <?php echo "\"$attrName\" => ($"."data[\"$attrName\"] == 'on' ? 1:0),"; ?> <?php endif; ?>
<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php echo "]);"; ?>


<?php if(key_exists("relations", $table) && !empty($table["relations"])): ?><?php $__currentLoopData = $table["relations"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($relation->isBelongsTo()): ?>
    <?php echo "if(request()->exists('".$relation->getOtherTable()."')){"; ?>

    $<?php echo $relation->getOtherTable()." = "; ?><?php echo ucfirst($relation->getOtherTable())."::find(request()->get('".$relation->getOtherTable()."'));"; ?>

    $<?php echo $table['title']."->".$relation->getOtherTable()."()->associate($".$relation->getOtherTable().")->save();"; ?>

    <?php echo "}"; ?>


<?php elseif($relation->isBelongsToMany()): ?>
    <?php echo "if(request()->exists('".$relation->getOtherTable()."')){"; ?>

    $<?php echo $table['title']."->".$relation->getOtherTable()."()->attach($"."data[\"".$relation->getOtherTable()."\"]);"; ?>

    <?php echo "}"; ?>

<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>