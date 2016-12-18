<div class="row">
    <div class="col-md-4">
        <h1 class="text-danger">List of <?php echo e(ucfirst($otherTable).'s'); ?></h1>
    </div>

    <div class="col-md-5">
        S2BOBRACKET session(['defaultSelect' => $<?php echo "$tab->".$tbs[$tab]['id']; ?>]) S2BCBRACKET
        <h4 class="text-danger"><b><?php echo e(ucfirst($tab)." : "); ?>S2BOBRACKET$<?php echo "$tab->".$config->displayedAttributes($tab); ?>S2BCBRACKET</b></h4>
    </div>
</div>

<div class="row">

    <div class="col-md-8 col-sm-8">
        <form action="S2BOBRACKET<?php echo "url(\"/".$tab."/search\")"; ?>S2BCBRACKET" method="get">
            <input type="hidden" name="tab" value="S2BOBRACKET$tableS2BCBRACKET" />
            <div class="col-md-2 col-sm-2">

            </div>

            <div class="col-md-9 col-sm-9">
                <div class="input-group input-search">
                    <input  type="text" class="form-control" name="keyword" placeholder="S2BOBRACKETsession('keyword', 'Keyword')S2BCBRACKET"/>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>


        </form>
    </div>

    <div class="col-md-2 col-sm-2">
        <form action="S2BOBRACKET<?php echo "url(Request::url())"; ?>S2BCBRACKET" method="get">
            <input type="hidden" name="cs" />
            <button type="submit" class="btn btn-danger">Clear Search</button>
        </form>
    </div>
</div>
<br/>

<div class="row">
    <div class="col-md-2 col-sm-2">
        <form action="S2BOBRACKET<?php echo "url(\"/".$otherTable."/create\")"; ?>S2BCBRACKET" method="get">
            <button type="submit" class="btn btn-primary">Add new <?php echo e(ucfirst($otherTable)); ?></button>
        </form>
    </div>
</div>
<br/>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
        </div>

        <h2 class="panel-title"><?php echo e(ucfirst($otherTable."s")); ?></h2>
    </header>
    <div class="panel-body">
<table class="table table-bordered table-striped mb-none" id="datatable-default">
    <thead>
    <tr>
        <?php $__currentLoopData = $tbs[$otherTable]["attributs"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($attrType->isDisplayable()): ?>
            <th class="<?php echo e($attrType->formClass("table")); ?>">
                <form action="S2BOBRACKET<?php echo "url(\"/".$tab."/sort\")"; ?>S2BCBRACKET" method="get">
                    <input type="hidden" name="<?php echo e($attrName); ?>"/>
                    <input type="hidden" name="tab" value="S2BOBRACKET$tableS2BCBRACKET" />
                    <button class="btn btn-link" type="submit"><p S3Bif(session('<?php echo e($attrName); ?>', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" S3Bendif ><?php echo ucfirst(str_replace("_", " ", $attrName)); ?> S3Bif(session('<?php echo e($attrName); ?>', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> S3Belseif(session('<?php echo e($attrName); ?>', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> S3Belse <span class="text-dark"><i class="fa fa-arrows-v"></i></span> S3Bendif</p></button>
                </form>
            </th><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

    </tr>
    </thead>

    <tbody>
    S3Bforelse($<?php echo "$tab->$otherTable"."_paginated as "; ?> $<?php echo "$otherTable"; ?>)
    <tr>
        <?php $__currentLoopData = $tbs[$otherTable]["attributs"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($attrType->isDisplayable()): ?>
            <td class="<?php echo e($attrType->formClass("table")); ?>">S2BOBRACKET$<?php echo $otherTable.'->'.$attrName; ?>S2BCBRACKET</td>
        <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <td class="defaut"><form action="S2BOBRACKET<?php echo "url(\"/".$otherTable."/$".$otherTable.'->'.$tbs[$otherTable]['id']."\")"; ?>S2BCBRACKET" method="get">
                <button type="submit" class="btn btn-link"><i class="fa fa-arrows-alt"></i></button>
            </form>
        </td>
        <td class="defaut"><form action="S2BOBRACKET<?php echo "url(\"/".$otherTable."/$".$otherTable.'->'.$tbs[$otherTable]['id']."\")"; ?>S2BCBRACKET/edit" method="get">
                <button type="submit" class="btn btn-link"><i class="fa fa-edit"></i></button>
            </form>
        </td>
        <td class="defaut">
            <input type="hidden" name="_token" value="S2BOBRACKET csrf_token() S2BCBRACKET" />
            <button type="submit" class="btn btn-link" ng-click="showModal('Delete', 'Do you really want to delete S2BOBRACKET $<?php echo $otherTable. "->".$config->displayedAttributes($otherTable); ?>S2BCBRACKET ?', 'S2BOBRACKET<?php echo "url(\"/".$otherTable."/$".$otherTable.'->'.$tbs[$otherTable]['id']."\")"; ?>S2BCBRACKET')"><i class="fa fa-trash-o"></i></button>
        </td>
        <?php $__currentLoopData = $tbs[$otherTable]['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($relation->getOtherTable() != $tab): ?>
            <td class="defaut">
                <form action="S2BOBRACKET<?php echo "url(\"/".$otherTable."/related/$".$otherTable.'->'.$tbs[$otherTable]['id']."\")"; ?>S2BCBRACKET" method="get">
                    <input type="hidden" name="tab" value="<?php echo $relation->getOtherTable(); ?>" />
                    <button type="submit" class="btn btn-link"><?php echo ucfirst($relation->getOtherTable()); ?></button>
                </form>
            </td>
        <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </tr>
    S3Bempty
    <tr>
        <td colspan="<?php echo e(count($tbs[$otherTable]['attributs'])); ?>"><label class="text-danger">No <?php echo e($otherTable); ?> matching keyword S2BOBRACKETsession('keyword', 'Keyword')S2BCBRACKET.</label></td>
    </tr>
    S3Bendforelse
    </tbody>
</table>
        <div class="row datatables-footer">
            <div class="col-md-4"></div>
            <div class="col-md-6">
                S2CBOBRACKET$<?php echo "$tab->$otherTable"."_paginated->links()"; ?>S2CBCBRACKET
            </div>
        </div>
    </div>
</section>