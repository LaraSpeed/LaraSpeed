<ul class="nav nav-main">
    <li>
        <a href="<?php echo "{"."{url(\"/home\")}"."}"; ?>">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span class="text-md">Dashboard</span>
        </a>
    </li>

    <?php $__currentLoopData = $tbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab => $table): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if(!$config->isPivot($tab)): ?>
        <li>
            <a href="<?php echo "{"."{url(\"/".$tab."\")}"."}"; ?>">
                <i class="<?php echo e($config->getTableIcon($tab)); ?>" aria-hidden="true"></i>
                <span class="text-md"><?php echo e(ucfirst($config->getPluralForm($tab))); ?></span>
            </a>
        </li>
    <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</ul>