    <?php echo "function get".(Berthe\Codegenerator\Utils\Helper::camelize($otherTable))."PaginatedAttribute(){"; ?>

        <?php echo "if(session(\"sortKey\", \"none\") == \"none\")"; ?>

            <?php echo "return $"."this->".$otherTable."()->paginate(20)->appends(array(\"tab\" => \"$otherTable\"));"; ?>


        <?php echo "return $"."this->".$otherTable."()->orderBy(session(\"sortKey\", \"".$config->displayedAttributes($otherTable)."\"), session(\"sortOrder\", \"asc\"))->paginate(20)->appends(array(\"tab\" => \"$otherTable\"));"; ?>


    <?php echo "}"; ?>