    <h1 class="text-danger">List of <?php echo e(ucfirst($table['title']).'s'); ?></h1>

    <div class="row">

        <div class="col-md-8 col-sm-8">

            <form action="S2BOBRACKET<?php echo "url(\"/".$table['title']."/search\")"; ?>S2BCBRACKET" method="get">
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
            <form action="S2BOBRACKET<?php echo "url(\"/".$table['title']."\")"; ?>S2BCBRACKET" method="get">
                <button type="submit" class="btn btn-danger">Clear Search</button>
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

    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
            </div>
            <h2 class="panel-title"><?php echo e(ucfirst($table["title"]."s")); ?></h2>
        </header>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table mb-none">
                    <thead>
                        <tr>
                        <?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($attrType->isDisplayable()): ?>
                            <!--class="{$attrType->formClass("table")}}"-->
                            <th class="center" nowrap> <!-- -->
                                <a S3Bif(session('<?php echo e($attrName); ?>', 'none') == 'asc') href="S2BOBRACKET<?php echo "url(\"/".$table['title']."/sort?$attrName=1&asc\")"; ?>S2BCBRACKET" S3Belse href="S2BOBRACKET<?php echo "url(\"/".$table['title']."/sort?$attrName=1&desc\")"; ?>S2BCBRACKET" S3Bendif><p S3Bif(session('<?php echo e($attrName); ?>', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" S3Bendif ><?php echo ucfirst(str_replace("_", " ", $attrName)); ?> S3Bif(session('<?php echo e($attrName); ?>', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> S3Belseif(session('<?php echo e($attrName); ?>', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> S3Belse <span class="text-dark"><i class="fa fa-arrows-v"></i></span> S3Bendif</p></a>
                            </th><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                            <?php if(key_exists("relations", $table) && !empty($table["relations"])): ?> <?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($relation->isBelongsTo()): ?>
                                <th class="center">
                                    <a href=""><p><?php echo e(ucfirst($relation->getOtherTable())); ?></p></a>
                                </th>
                            <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>

                            <th class="center"><a href=""><p>Actions</p></a></th>
                            <?php if(key_exists("relations", $table) && !empty($table["relations"])): ?>
                            <th class="center"><a href=""><p>Relations</p></a></th>
                            <?php endif; ?>
                        </tr>
                    </thead>

                    <tbody>
                        S3Bforelse($<?php echo e($table['title'].'s'); ?> as $<?php echo e($table['title']); ?>)
                            <tr>
                            <?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($attrType->isDisplayable()): ?>
                                <!--class="{$attrType->formClass("table")}}"-->
                                <td class="center">S2BOBRACKET$<?php echo $table['title'].'->'.$attrName; ?>S2BCBRACKET</td>
                            <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                <?php if(key_exists("relations", $table) && !empty($table["relations"])): ?><?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($relation->isBelongsTo()): ?>
                                    <td class="center">
                                        S3Bif(<?php echo "$".$table["title"].'->'.$relation->getOtherTable(); ?>)
                                            S2BOBRACKET<?php echo "$".$table["title"].'->'.$relation->getOtherTable().'->'.$config->displayedAttributes($relation->getOtherTable()); ?>S2BCBRACKET
                                        S3Belse
                                            S2BOBRACKET "Not specified" S2BCBRACKET
                                        S3Bendif
                                    </td>
                                <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>

                                <td class="center">
                                    <a href="S2BOBRACKET<?php echo "url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"; ?>S2BCBRACKET"><i class="fa fa-arrows-alt"></i></a>
                                    <a href="S2BOBRACKET<?php echo "url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"; ?>S2BCBRACKET/edit"><i class="fa fa-edit"></i></a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete S2BOBRACKET $<?php echo $table['title']. "->".$config->displayedAttributes($table['title']); ?>S2BCBRACKET ?', 'S2BOBRACKET<?php echo "url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"; ?>S2BCBRACKET')"><i class="fa fa-trash-o"></i></a>
                                </td>

                                <?php if(key_exists("relations", $table) && !empty($table["relations"])): ?><?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if(!$relation->isBelongsTo()): ?>
                                <td class="center">
                                    <form action="S2BOBRACKET<?php echo "url(\"/".$table['title']."/related/$".$table['title'].'->'.$table['id']."\")"; ?>S2BCBRACKET" method="get">
                                        <input type="hidden" name="tab" value="<?php echo $relation->getOtherTable(); ?>" />
                                        <button type="submit" class="btn btn-link"><?php echo ucfirst($relation->getOtherTable()); ?></button>
                                    </form>
                                </td>
                            <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>
                            </tr>
                        S3Bempty
                            <tr>
                                <td colspan="<?php echo e(count($table['attributs'])); ?>"><label class="text-danger">No <?php echo e($table['title']); ?> matching keyword S2BOBRACKETsession('keyword', 'Keyword')S2BCBRACKET.</label></td>
                            </tr>
                        S3Bendforelse
                    </tbody>
                </table><!--End Table-->
            </div>

            <div class="row datatables-footer">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    S2CBOBRACKET$<?php echo $table['title']."s->links()"; ?>S2CBCBRACKET
                </div>
            </div>
        </div>
    </section>