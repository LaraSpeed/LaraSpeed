    <label class="text-danger text-md">Associate <?php echo e(ucfirst($config->getPluralForm($otherTable))); ?></label>
        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one <?php echo $otherTable; ?>"  name="<?php echo $otherTable; ?>[]">
            S3Bforelse(<?php echo "\\App\\".ucfirst($otherTable)."::all()->sortBy('".$config->displayedAttributes($otherTable)."') as "; ?> $<?php echo "$otherTable"; ?>)
                <option value="S2BOBRACKET$<?php echo "$otherTable->".$tbs[$otherTable]["id"]; ?>S2BCBRACKET">
                    S2BOBRACKET$<?php echo "$otherTable->".$config->displayedAttributes($otherTable); ?>S2BCBRACKET
                </option>
            S3Bempty
                <option value="-1">No <?php echo e($otherTable); ?></option>
            S3Bendforelse
        </select><br/>