<label class="text-danger text-md"><?php if($type == \Berthe\Codegenerator\Utils\Variable::$EDIT_VIEW): ?> Update <?php endif; ?><?php echo e(ucfirst($otherTable)); ?></label>
    <select class="form-control" name="<?php echo e($otherTable); ?>" <?php if($type == \Berthe\Codegenerator\Utils\Variable::$DISPLAY_VIEW): ?> disabled <?php endif; ?>>
        S3Bforelse(<?php echo "\\App\\".ucfirst($otherTable)."::all() as "; ?> $<?php echo "$otherTable"; ?>)
        <option value="S2BOBRACKET$<?php echo "$otherTable->".$tbs[$otherTable]["id"]; ?>S2BCBRACKET" S3Bif($<?php echo "$otherTable->".$tbs[$otherTable]["id"]." == $"."$tab->$otherTable->".$tbs[$otherTable]["id"]; ?>) selected = "selected" S3Bendif>
            S2BOBRACKET$<?php echo "$otherTable->".$config->displayedAttributes($otherTable); ?>S2BCBRACKET
        </option>
        S3Bempty
        <option value="-1">No <?php echo e($otherTable); ?></option>
        S3Bendforelse
    </select><br/>