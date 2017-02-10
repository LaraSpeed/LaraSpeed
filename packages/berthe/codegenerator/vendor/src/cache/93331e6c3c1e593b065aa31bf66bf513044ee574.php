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
		</div> <br/>
		<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>

	<?php if(array_key_exists('relations', $table)): ?><?php $__currentLoopData = $table['relations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relationType): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($relationType->isBelongsTo()): ?>
		<div class="row">
			<div class="col-md-2">
				<label class="text-primary"><?php echo e(ucfirst($relationType->getOtherTable())); ?> : </label>
			</div>

			<div class="col-md-5">
				<select class="form-control" name="<?php echo $relationType->getOtherTable(); ?>">
					S3Bforelse(<?php echo "\\App\\".ucfirst($relationType->getOtherTable())."::all() as "; ?> $<?php echo $relationType->getOtherTable(); ?>)
					<option value="S2BOBRACKET$<?php echo $relationType->getOtherTable()."->".$tbs[$relationType->getOtherTable()]["id"]; ?>S2BCBRACKET" S3Bif(session('defaultSelect', 'none') == $<?php echo $relationType->getOtherTable()."->".$tbs[$relationType->getOtherTable()]["id"]; ?>) S2BOBRACKET<?php echo "\"selected=\\\"\\\"selected\\\"\""; ?>S2BCBRACKET S3Bendif>
						S2BOBRACKET$<?php echo $relationType->getOtherTable()."->".$config->displayedAttributes($relationType->getOtherTable()); ?>S2BCBRACKET
					</option>
					S3Bempty
					<option value="-1">No <?php echo e($relationType->getOtherTable()); ?></option>
					S3Bendforelse
				</select>
			</div>
		</div><br/>
		<?php elseif($relationType->isBelongsToMany()): ?>
		<div class="row">
			<div class="col-md-2">
				<label class="text-primary"><?php echo e(ucfirst($relationType->getOtherTable())); ?>s : </label>
			</div>

			<div class="col-md-7">
				<select class="form-control" multiple="multiple" size="10"  name="<?php echo $relationType->getOtherTable(); ?>[]">
					S3Bforelse(<?php echo "\\App\\".ucfirst($relationType->getOtherTable())."::all() as "; ?> $<?php echo $relationType->getOtherTable(); ?>)
					<option value="S2BOBRACKET$<?php echo $relationType->getOtherTable()."->".$tbs[$relationType->getOtherTable()]["id"]; ?>S2BCBRACKET" S3Bif(session('defaultSelect', 'none') == $<?php echo $relationType->getOtherTable()."->".$tbs[$relationType->getOtherTable()]["id"]; ?>) S2BOBRACKET<?php echo "\"selected=\\\"\\\"selected\\\"\""; ?>S2BCBRACKET S3Bendif>
					S2BOBRACKET$<?php echo $relationType->getOtherTable()."->".$config->displayedAttributes($relationType->getOtherTable()); ?>S2BCBRACKET
					</option>
					S3Bempty
					<option value="-1">No <?php echo e($relationType->getOtherTable()); ?></option>
					S3Bendforelse
				</select>
			</div>

			<script>
				var demo1 = $('select[name="<?php echo e($relationType->getOtherTable()); ?>[]"]').bootstrapDualListbox(
						{
							nonSelectedListLabel: 'List of <?php echo e(ucfirst($relationType->getOtherTable())); ?>',
							selectedListLabel: 'Selected <?php echo e(ucfirst($relationType->getOtherTable())); ?>'
						}
				);
			</script>

		</div><br/>
	<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> <?php endif; ?>

		<div class="row">
			<div class="col-md-2">
				<label class="text-danger"> * = Mandatory fields</label>
			</div>
		</div> <br/>

		<div class="row">
			<div class="col-md-2">
			<button type="submit" class="btn btn-primary">Create and return to list</button>
			</div>

			<div class="col-md-1 col-md-offset-4">
			<button type="reset" onclick="goBack();" class="btn btn-danger">Cancel and return to list</button>
			</div>
		</div>
</form>
