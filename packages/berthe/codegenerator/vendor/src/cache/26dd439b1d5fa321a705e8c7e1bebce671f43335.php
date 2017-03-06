            <?php echo '$table->integer(\''.$tab.'_id\')->unsigned()->index()->nullable();'; ?>

            <?php echo '$table->foreign(\''.$tab.'_id\')->references(\'id\')->on(\''.$tab.'\')->onDelete(\'cascade\')->onUpdate(\'cascade\');'; ?>