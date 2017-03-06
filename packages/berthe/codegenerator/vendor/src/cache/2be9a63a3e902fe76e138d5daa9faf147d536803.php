    <h3 class="text-danger">Associate <?php echo e(ucfirst($otherTable)); ?></h3>
        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one <?php echo $otherTable; ?>"  name="<?php echo $otherTable; ?>[]">
            S3Bforelse(<?php echo "\\App\\".ucfirst($otherTable)."::all() as "; ?> $<?php echo "$otherTable"; ?>)
                <option value="S2BOBRACKET$<?php echo "$otherTable->".$tbs[$otherTable]["id"]; ?>S2BCBRACKET">
                    S2BOBRACKET$<?php echo "$otherTable->".$config->displayedAttributes($otherTable); ?>S2BCBRACKET
                </option>
            S3Bempty
                <option value="-1">No <?php echo e($otherTable); ?></option>
            S3Bendforelse
        </select><br/>