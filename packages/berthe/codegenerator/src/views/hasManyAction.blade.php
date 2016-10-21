{!! "function add".ucfirst($otherTable)."(".ucfirst($tab)." $"."$tab ){" !!}
    ${!! "$tab->$otherTable()->save(\\App\\".ucfirst($otherTable)."::find(request()->get('$otherTable')));" !!}
    {!! "return back();" !!}
{!! "}" !!}