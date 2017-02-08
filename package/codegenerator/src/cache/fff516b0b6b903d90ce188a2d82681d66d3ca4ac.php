<?php echo "function update".ucfirst($otherTable)."(".ucfirst($tab)." $"."$tab ){"; ?>

    $<?php echo "$otherTable = "; ?><?php echo "\\App\\".ucfirst($otherTable)."::find(request()->get('$otherTable'));"; ?>

    $<?php echo "$tab->$otherTable()->associate($".$otherTable.")->save();"; ?>

    <?php echo "return back();"; ?>

<?php echo "}"; ?>