            <?php echo '$table->integer(\''.$tbs[$tab]['id'].'\')->unsigned()->index()->nullable();'; ?>

            <?php echo '$table->foreign(\''.$tbs[$tab]['id'].'\')->references(\''.$tbs[$tab]['id'].'\')->on(\''.$tab.'\')->onDelete(\'cascade\')->onUpdate(\'cascade\');'; ?>