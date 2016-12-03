<?php echo "function add".ucfirst($otherTable)."(".ucfirst($tab)." $"."$tab ){"; ?>

    $<?php echo "$tab->$otherTable()->sync(request()->get('$otherTable'));"; ?>

    <?php echo "return back();"; ?>

<?php echo "}"; ?>