<h1 class="text-danger"><?php echo e(ucfirst($table['title'])); ?> add form</h1>
<form action="S2BOBRACKET<?php echo "url(\"/".$table['title']."\")"; ?>S2BCBRACKET" method="post"><?php if( array_key_exists('attributs', $table) ): ?><?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($attrType->isDisplayable()): ?>

		<input type="hidden" name="_token" value="S2BOBRACKET csrf_token() S2BCBRACKET">
		<div class="form-group-lg">
			<label id="<?php echo e($attrName); ?>"><?php echo e(ucfirst($attrName)); ?> : </label>
			<?php echo $attrType->getForm(); ?>

		</div>
		<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>

		<br/><div class="form-group-lg">
			<button type="submit" class="btn btn-primary">Submit</button>
			<button type="reset" class="btn btn-primary">Cancel</button>
		</div>
</form>
