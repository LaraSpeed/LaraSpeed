    <?php echo "function add".ucfirst($otherTable)."(".ucfirst($tab)." $"."$tab ){"; ?>

        $<?php echo "newOnes = ".ucfirst($otherTable)."::find(request()->get('film'));"; ?>


        <?php echo "foreach ($"."newOnes as $"."newOne){"; ?>

            $<?php echo "$tab->$otherTable()->save($"."newOne);"; ?>

        <?php echo "}"; ?>


        <?php echo "return back();"; ?>

    <?php echo "}"; ?>