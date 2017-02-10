<ul class="nav nav-main">
    <li>
        <a href="">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <?php $__currentLoopData = $tbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab => $table): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <li>
            <a href="<?php echo "{"."{url(\"/".$tab."\")}"."}"; ?>">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span><?php echo e(ucfirst($tab)); ?></span>
            </a>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</ul>