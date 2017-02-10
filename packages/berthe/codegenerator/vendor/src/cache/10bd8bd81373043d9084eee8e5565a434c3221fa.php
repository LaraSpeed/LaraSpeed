<h3 class="text-danger">Associate <?php echo e(ucfirst($otherTable)); ?></h3>
<form action="S2BOBRACKET<?php echo "url(\"/".$tab."/add".ucfirst($otherTable)."/$".$tab."->".$tbs[$tab]['id']."\")"; ?>S2BCBRACKET" method="post">
    <input type="hidden" name="_token" value="S2BOBRACKET csrf_token() S2BCBRACKET" />
    <select class="form-control" multiple="multiple" size="10"  name="<?php echo $otherTable; ?>[]">
        S3Bforelse(<?php echo "\\App\\".ucfirst($otherTable)."::all() as "; ?> $<?php echo "$otherTable"; ?>)
        <option value="S2BOBRACKET$<?php echo "$otherTable->".$tbs[$otherTable]["id"]; ?>S2BCBRACKET" S3Bforeach($<?php echo "$tab->".$otherTable." as "; ?> $<?php echo "$otherTable"."tmp"; ?>) S3Bif($<?php echo "$otherTable"."tmp->".$tbs[$otherTable]['id']." == $"."$otherTable->".$tbs[$otherTable]["id"]; ?>) selected = "selected" S3Bendif S3Bendforeach>
                S2BOBRACKET$<?php echo "$otherTable->".$config->displayedAttributes($otherTable); ?>S2BCBRACKET
        </option>
        S3Bempty
        <option value="-1">No <?php echo e($otherTable); ?></option>
        S3Bendforelse
    </select><br/>

    <script>
        var demo1 = $('select[name="<?php echo e($otherTable); ?>[]"]').bootstrapDualListbox(
                {
                    nonSelectedListLabel: 'List of <?php echo e(ucfirst($otherTable)); ?>',
                    selectedListLabel: 'Selected <?php echo e(ucfirst($otherTable)); ?>'
                }
        );
    </script>

    <input type="submit"  class="btn btn-primary" value="Associate"/>
</form>