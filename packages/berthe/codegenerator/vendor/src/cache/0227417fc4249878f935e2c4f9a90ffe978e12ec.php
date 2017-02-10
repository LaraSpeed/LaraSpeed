<h1>Formulaire d'ajout <?php echo e(ucfirst($table['title'])); ?></h1>
<form action="<?php echo e($table['title']); ?>" method="post"><?php if( array_key_exists('attributs', $table) ): ?><?php $__currentLoopData = $table['attributs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrName => $attrType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($attrType->isDisplayable()): ?>

		<div class="form-group-lg">
			<label id="<?php echo e($attrName); ?>"><?php echo e(ucfirst($attrName)); ?> : </label>
			<?php echo $attrType->getForm(); ?>

		</div>
		<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>

	<?php if(array_key_exists('relations', $table)): ?><?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relationType => $tab): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($relationType == "hasMany"): ?>
		<div class="form-group-lg">
				<label id="<?php echo e($tab[0]); ?>"><?php echo e(ucfirst($tab[0])); ?></label>
				<select name="<?php echo e($tab[0]); ?>select" class="form-control"></select>
			</div>
	<?php elseif($relationType == "belongsTo"): ?>
		<div class="form-group-lg">
			<label id="<?php echo e($tab[0]); ?>"><?php echo e(ucfirst($tab[0])); ?></label>
			<select name="<?php echo e($tab[0]); ?>select" class="form-control"></select>
		</div>
	<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>

		<br/><div class="form-group-lg">
			<button type="submit" class="btn btn-primary">Soumettre</button>
			<button type="reset" class="btn btn-primary">Annuler</button>
		</div>
</form>
