<ul class="sidebar-nav">
    <li class="sidebar-brand">
        <a href="#menu-toggle" id="menu-toggle1"><h3>LaraSpeed</h3></a>
    </li>

    <?php $__currentLoopData = $tbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab => $table): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <li>
        <a href="<?php echo "{"."{url(\"/".$tab."\")}"."}"; ?>"><?php echo e(ucfirst($tab)); ?></a>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</ul>