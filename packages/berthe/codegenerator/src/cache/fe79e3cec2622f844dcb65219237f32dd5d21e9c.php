<h3>Update <?php echo e(ucfirst($otherTable)); ?></h3>
<form action="S2BOBRACKET<?php echo "url(\"/".$tab."/update".ucfirst($otherTable)."/$".$tab."->".$tbs[$tab]['id']."\")"; ?>S2BCBRACKET" method="post">
    <input type="hidden" name="_token" value="S2BOBRACKET csrf_token() S2BCBRACKET" />
    <select class="form-control" name="<?php echo e($otherTable); ?>">
        S3Bforelse(<?php echo "\\App\\".ucfirst($otherTable)."::all() as "; ?> $<?php echo "$otherTable"; ?>)
        <option value="S2BOBRACKET$<?php echo "$otherTable->".$tbs[$otherTable]["id"]; ?>S2BCBRACKET" S3Bif($<?php echo "$otherTable->".$tbs[$otherTable]["id"]." == $"."$tab->$otherTable->".$tbs[$otherTable]["id"]; ?>) selected = "selected" S3Bendif>
            S2BOBRACKET$<?php echo "$otherTable->".$config->displayedAttributes($otherTable); ?>S2BCBRACKET
        </option>
        S3Bempty
        <option value="-1">No <?php echo e($otherTable); ?></option>
        S3Bendforelse
    </select><br/>

    <input type="submit"  class="btn btn-primary" value="Update"/>
</form>