{{"function $tab(){ "}}
    {!!'return $this->'.$type.'(\'App\\'.ucfirst($tab).'\''!!}{!! !empty($foreignKey)?(', \''.$foreignKey.'\''):''!!}{!! !empty($parentKey)?(', \''.$parentKey.'\''):''!!}{!!');'!!}
{{"}"}}
