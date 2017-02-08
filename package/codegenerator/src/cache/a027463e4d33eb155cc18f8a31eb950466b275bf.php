<h1 class="text-danger">List of <?php echo e(ucfirst($table['title']).'s'); ?></h1>

<div class="row">

    <div class="col-md-8 col-sm-8">
<form action="S2BOBRACKET<?php echo "url(\"/".$table['title']."/search\")"; ?>S2BCBRACKET" method="get">

    <div class="col-md-2 col-sm-2">
        <input type="submit" class="btn btn-primary" value="Search"/>
    </div>

    <div class="col-md-10 col-sm-10">
        <input  type="text" class="form-control" name="keyword" placeholder="S2BOBRACKETsession('keyword', 'Keyword')S2BCBRACKET"/>
    </div>


</form>
    </div>

    <div class="col-md-1 col-sm-1">
        <form action="S2BOBRACKET<?php echo "url(\"/".$table['title']."\")"; ?>S2BCBRACKET" method="get">
            <button type="submit" class="btn btn-primary">Clear Search</button>
        </form>
    </div>
</div>
<br/>

<div class="row">
    <div class="col-md-2 col-sm-2">
        <form action="S2BOBRACKET<?php echo "url(\"/".$table['title']."/create\")"; ?>S2BCBRACKET" method="get">
            <button type="submit" class="btn btn-primary">Add new <?php echo e(ucfirst($table['title'])); ?></button>
        </form>
    </div>
</div>
<br/>

<table class="table table-striped">
    <thead>
        <tr>
            <?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($attrType->isDisplayable()): ?>
            <th class="<?php echo e($attrType->formClass("table")); ?>">
                <form action="S2BOBRACKET<?php echo "url(\"/".$table['title']."/sort\")"; ?>S2BCBRACKET" method="get">
                    <input type="hidden" name="<?php echo e($attrName); ?>"/>
                <button class="btn btn-link" type="submit"><p S3Bif(session('<?php echo e($attrName); ?>', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" S3Bendif ><?php echo ucfirst(str_replace("_", "<br/>", $attrName)); ?> <img src="S2BOBRACKET URL::asset(session('<?php echo e($attrName); ?>', 'none').'.png') S2BCBRACKET" /></p></button>
                </form>
            </th><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

        </tr>
    </thead>

    <tbody>
        S3Bforelse($<?php echo e($table['title'].'s'); ?> as $<?php echo e($table['title']); ?>)
            <tr>
    <?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($attrType->isDisplayable()): ?>
        <td class="<?php echo e($attrType->formClass("table")); ?>">S2BOBRACKET$<?php echo $table['title'].'->'.$attrName; ?>S2BCBRACKET</td>
    <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <td class="defaut"><form action="S2BOBRACKET<?php echo "url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"; ?>S2BCBRACKET" method="get">
                <button type="submit" class="btn btn-link">View</button>
            </form>
        </td>
        <td class="defaut"><form action="S2BOBRACKET<?php echo "url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"; ?>S2BCBRACKET/edit" method="get">
                <button type="submit" class="btn btn-link">Edit</button>
            </form>
        </td>
        <td class="defaut">
            <input type="hidden" name="_token" value="S2BOBRACKET csrf_token() S2BCBRACKET" />
            <button type="submit" class="btn btn-link" ng-click="showModal('Delete', 'Do you really want to delete S2BOBRACKET $<?php echo $table['title']. "->".$config->displayedAttributes($table['title']); ?>S2BCBRACKET ?', 'S2BOBRACKET<?php echo "url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"; ?>S2BCBRACKET')">Delete</button>
        </td>
        <?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <td class="defaut">
                <form action="S2BOBRACKET<?php echo "url(\"/".$table['title']."/related/$".$table['title'].'->'.$table['id']."\")"; ?>S2BCBRACKET" method="get">
                    <input type="hidden" name="tab" value="<?php echo $relation->getOtherTable(); ?>" />
                    <button type="submit" class="btn btn-link"><?php echo ucfirst($relation->getOtherTable()); ?></button>
                </form>
            </td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tr>
        S3Bempty
            <tr>
                <td colspan="<?php echo e(count($table['attributs'])); ?>"><label class="text-danger">No <?php echo e($table['title']); ?> matching keyword S2BOBRACKETsession('keyword', 'Keyword')S2BCBRACKET.</label></td>
            </tr>
        S3Bendforelse
    </tbody>
</table>
S2CBOBRACKET$<?php echo $table['title']."s->links()"; ?>S2CBCBRACKET