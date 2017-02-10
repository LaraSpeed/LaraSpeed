
    {!! "function add".ucfirst($otherTable)."(".ucfirst($tab)." $"."$tab ){" !!}
        ${!! "$tab->$otherTable()->sync(request()->get('$otherTable'));" !!}
        {!! "return back();" !!}
    {!! "}" !!}