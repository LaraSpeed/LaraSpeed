<h1 class="text-danger"><?php echo e(ucfirst($table['title'])); ?> add form</h1>
<form action="S2BOBRACKET<?php echo "url(\"/".$table['title']."\")"; ?>S2BCBRACKET" method="post"><?php if( array_key_exists('attributs', $table) ): ?><?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($attrType->isDisplayable()): ?>

		<input type="hidden" name="_token" value="S2BOBRACKET csrf_token() S2BCBRACKET">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="<?php echo e($attrName); ?>"><?php if($attrType->isRequired()): ?><?php echo e(str_replace("_", " ", ucfirst($attrName))); ?> * : <?php else: ?> <?php echo e(str_replace("_", " ", ucfirst($attrName))); ?> : <?php endif; ?></label>
			</div>
			<div class="<?php echo $attrType->formClass("form"); ?>">
			<?php echo $attrType->getForm(); ?>

			</div>

			<?php if($attrType->isRequired()): ?>
				<div class="col-md-2">
					<span class="text-danger">Mandatory fields</span>
				</div>
			<?php endif; ?>

		</div> <br/>
		<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>

		<div class="row">
			<div class="col-md-2">
			<button type="submit" class="btn btn-primary">Create and return to list</button>
			</div>

			<div class="col-md-1 col-md-offset-4">
			<button type="reset" onclick="goBack();" class="btn btn-danger">Cancel and return to list</button>
			</div>
		</div>
</form>
