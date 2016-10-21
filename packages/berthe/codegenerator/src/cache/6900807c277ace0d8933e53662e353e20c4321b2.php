<?php echo "function add".ucfirst($otherTable)."(".ucfirst($tab)." $"."$tab ){"; ?>

    $<?php echo "$tab->$otherTable()->save(\\App\\".ucfirst($otherTable)."::find(request()->get('$otherTable')));"; ?>

    <?php echo "return back();"; ?>

<?php echo "}"; ?>