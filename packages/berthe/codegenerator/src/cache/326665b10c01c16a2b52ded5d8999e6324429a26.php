    <h1 class="text-danger">Display <?php echo e(ucfirst($table['title'])); ?></h1>

    <a href="S2BOBRACKET<?php echo "url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"; ?>S2BCBRACKET/edit">Edit</a></br>

    <br/>


    <?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($attrType->isDisplayable()): ?>

        <div class="form-group">
            <label class="text-danger text-md"><?php echo e(ucfirst(str_replace("_", " ", $attrName))); ?> : </label>
            <?php if($attrType->hasUnit()): ?>
                <div class="input-group mb-md">
                    <span class="input-group-addon"><?php echo e($attrType->getUnit()); ?></span>
                    <?php echo $attrType->getForm("S2BOBRACKET$".$table['title'].'->'.$attrName."S2BCBRACKET", false); ?>

                </div>
            <?php else: ?> <?php echo $attrType->getForm("S2BOBRACKET$".$table['title'].'->'.$attrName."S2BCBRACKET", false); ?> <?php endif; ?>
        </div>
    <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


    <?php if(key_exists("relations", $table) && !empty($table["relations"])): ?><?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        S3Bif(isset($<?php echo $relation->getTable()."->".$relation->getOtherTable(); ?>))
        <?php echo $__env->make($relation->getEditView(), ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs, "config" => $config, "type" => \Berthe\Codegenerator\Utils\Variable::$DISPLAY_VIEW], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        S3Belse
        <?php if($relation->isBelongsTo()): ?>
            <?php echo $__env->make("simpleBelongTo", ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs, "config" => $config], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php elseif($relation->isBelongsToMany()): ?>
            <?php echo $__env->make("simpleBelongToMany", ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs, "config" => $config], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        S3Bendif
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>


    <?php if(key_exists("relations", $table) && !empty($table["relations"])): ?><?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

    S3Bif(isset($<?php echo $table['title'].'->'.$relation->getOtherTable(); ?>))
        <?php echo $__env->make(/*$relation->getDisplayView()*/"mockup", ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    S3Belse
        <label class="text-danger text-md">No <?php echo e($relation->getOtherTable()); ?> related to this <?php echo e($relation->getTable()); ?>.</label>
    S3Bendif
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>