{!!'$table->integer(\''.$tab.'_id\')->unsigned()->index();'!!}
{!!'$table->foreign(\''.$tab.'_id\')->references(\'id\')->on(\''.$tab.'\')->onDelete(\'cascade\')->onUpdate(\'cascade\');'!!}