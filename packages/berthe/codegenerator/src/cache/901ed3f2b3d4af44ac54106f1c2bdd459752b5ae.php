    <label class="text-danger text-md">Associate <?php echo e(ucfirst($otherTable)); ?></label>

        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one <?php echo $otherTable; ?>"  name="<?php echo $otherTable; ?>[]" <?php if($type == \Berthe\Codegenerator\Utils\Variable::$DISPLAY_VIEW): ?> disabled <?php endif; ?>>
            S3Bforelse(<?php echo "\\App\\".ucfirst($otherTable)."::all()->sortBy('".$config->displayedAttributes($otherTable)."') as "; ?> $<?php echo "$otherTable"; ?>)
                <option value="S2BOBRACKET$<?php echo "$otherTable->".$tbs[$otherTable]["id"]; ?>S2BCBRACKET" S3Bforeach($<?php echo "$tab->".$otherTable." as "; ?> $<?php echo "$otherTable"."tmp"; ?>) S3Bif($<?php echo "$otherTable"."tmp->".$tbs[$otherTable]['id']." == $"."$otherTable->".$tbs[$otherTable]["id"]; ?>) selected = "selected" <?php if($type == \Berthe\Codegenerator\Utils\Variable::$EDIT_VIEW): ?> disabled <?php endif; ?> S3Bendif S3Bendforeach>
                    S2BOBRACKET$<?php echo "$otherTable->".$config->displayedAttributes($otherTable); ?>S2BCBRACKET
                </option>
            S3Bempty
                <option value="-1">No <?php echo e($otherTable); ?></option>
            S3Bendforelse

        </select><br/>