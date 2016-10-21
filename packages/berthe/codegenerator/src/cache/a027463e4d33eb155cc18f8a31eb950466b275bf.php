<h1 class="text-danger">List of <?php echo e(ucfirst($table['title']).'s'); ?></h1>

<div class="row">
    <div class="col-md-2 col-sm-2">
        <form action="S2BOBRACKET<?php echo "url(\"/".$table['title']."\")"; ?>S2BCBRACKET" method="get">
            <button type="submit" class="btn btn-primary">Clear Search</button>
        </form>
    </div>

    <div class="col-md-8 col-sm-8">
<form action="S2BOBRACKET<?php echo "url(\"/".$table['title']."/search\")"; ?>S2BCBRACKET" method="get">

    <div class="col-md-10 col-sm-10">
        <input  type="text" class="form-control" name="keyword" placeholder="S2BOBRACKETsession('keyword', 'Keyword')S2BCBRACKET"/>
    </div>

    <div class="col-md-2 col-sm-2">
        <input type="submit" class="btn btn-primary" value="Search"/>
    </div>

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
            <th>
                <a href="S2BOBRACKET<?php echo "url(\"/".$table['title']."/sort?$attrName\")"; ?>S2BCBRACKET"><?php echo e(ucfirst(str_replace("_", " ", $attrName))); ?></a>
            </th><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

        </tr>
    </thead>

    <tbody>
        S3Bforelse($<?php echo e($table['title'].'s'); ?> as $<?php echo e($table['title']); ?>)
            <tr>
    <?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($attrType->isDisplayable()): ?>
        <td>S2BOBRACKET$<?php echo $table['title'].'->'.$attrName; ?>S2BCBRACKET</td>
    <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <td><form action="S2BOBRACKET<?php echo "url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"; ?>S2BCBRACKET" method="get">
                <button type="submit" class="btn btn-link">View</button>
            </form>
        </td>
        <td><form action="S2BOBRACKET<?php echo "url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"; ?>S2BCBRACKET/edit" method="get">
                <button type="submit" class="btn btn-link">Edit</button>
            </form>
        </td>
        <td><form action="S2BOBRACKET<?php echo "url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"; ?>S2BCBRACKET" method="post">
                <?php echo e(method_field('DELETE')); ?><input type="hidden" name="_token" value="S2BOBRACKET csrf_token() S2BCBRACKET" /><button type="submit" class="btn btn-link">Delete</button>
            </form>
        </td>
        <?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <td>
                <form action="S2BOBRACKET<?php echo "url(\"/".$table['title']."/related/$".$table['title'].'->'.$table['id']."\")"; ?>S2BCBRACKET" method="get">
                    <button type="submit" class="btn btn-link"><?php echo ucfirst($relation->getOtherTable()); ?></button>
                </form>
            </td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tr>
        S3Bempty
            <tr>
                <td>No <?php echo e($table['title']); ?>.</td>
            </tr>
        S3Bendforelse
    </tbody>
</table>
S2CBOBRACKET$<?php echo $table['title']."s->links()"; ?>S2CBCBRACKET