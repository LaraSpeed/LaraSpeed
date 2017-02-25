    <label class="text-danger text-md">Add <?php echo e(ucfirst($config->getPluralForm($otherTable))); ?></label>
        <select id="<?php echo e($otherTable); ?>" name="<?php echo $otherTable; ?>[]" multiple="multiple" size="10">
            S3Bforelse(<?php echo "\\App\\".ucfirst($otherTable)."::paginate(".\Berthe\Codegenerator\Utils\Variable::$EDIT_VIEW_PAGINATION.")->sortBy('".$config->displayedAttributes($otherTable)."') as "; ?> $<?php echo "$otherTable"; ?>)
                <option value="S2BOBRACKET$<?php echo "$otherTable->".$tbs[$otherTable]["id"]; ?>S2BCBRACKET" S3Bforeach($<?php echo "$tab->".$otherTable." as "; ?> $<?php echo "$otherTable"."tmp"; ?>) S3Bif($<?php echo "$otherTable"."tmp->".$tbs[$otherTable]['id']." == $"."$otherTable->".$tbs[$otherTable]["id"]; ?>) selected = "selected" S3Bendif S3Bendforeach>
                    S2BOBRACKET$<?php echo "$otherTable->".$config->displayedAttributes($otherTable); ?>S2BCBRACKET
                </option>
            S3Bempty
                <option value="-1">No <?php echo e($otherTable); ?></option>
            S3Bendforelse
        </select>
        S2CBOBRACKET<?php echo "\\App\\".ucfirst($otherTable)."::paginate(".\Berthe\Codegenerator\Utils\Variable::$EDIT_VIEW_PAGINATION.")"."->links()"; ?>S2CBCBRACKET
        <script> $('#<?php echo e($otherTable); ?>').bootstrapDualListbox(
            {
                nonSelectedListLabel: 'Non-selected <?php echo e(ucfirst($otherTable)); ?>',
                selectedListLabel: 'Selected <?php echo e(ucfirst($otherTable)); ?>',
                moveOnSelect: true,
                nonSelectedFilter: ''
            }
        ); </script>
        <br/>