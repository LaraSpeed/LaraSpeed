    <?php echo "function get".(Berthe\Codegenerator\Utils\Helper::camelize($otherTable))."PaginatedAttribute(){"; ?>

        $<?php echo "$otherTable ="; ?> $<?php echo "this->".$otherTable."();"; ?>

        <?php echo "if(session(\"keyword\", \"none\") != \"none\"){"; ?>

            $<?php echo "key = \"%\".session('keyword','').\"%\";"; ?>

            $<?php echo "$otherTable"."->where('".$config->displayedAttributes($otherTable)."', 'like', $"."key)"; ?>

        <?php if(array_key_exists('attributs', $tbs[$otherTable])): ?><?php $__currentLoopData = $tbs[$otherTable]['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrVal): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($attrVal->isDisplayable()and $attrName != $config->displayedAttributes($otherTable)): ?>
    <?php echo "->orWhere('$attrName', 'like', $"."key)"; ?>

     <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?> <?php echo ";"; ?>


        <?php echo "}"; ?>


        <?php echo "if(session(\"sortKey\", \"none\") == \"none\" or !Schema::hasColumn(\"$otherTable\", session(\"sortKey\", \"none\")))"; ?>

            <?php echo "return $".$otherTable."->paginate(20)->appends(array(\"tab\" => \"$otherTable\"));"; ?>


        <?php echo "return $".$otherTable."->orderBy(session(\"sortKey\", \"".$config->displayedAttributes($otherTable)."\"), session(\"sortOrder\", \"asc\"))->paginate(20)->appends(array(\"tab\" => \"$otherTable\"));"; ?>


    <?php echo "}"; ?>

