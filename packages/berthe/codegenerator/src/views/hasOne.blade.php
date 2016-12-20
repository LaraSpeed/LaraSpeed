{!! "function update".ucfirst($otherTable)."(".ucfirst($tab)." $"."$tab ){" !!}
    ${!! "$otherTable = " !!}{!! "\\App\\".ucfirst($otherTable)."::find(request()->get('$otherTable'));" !!}
    ${!! "$tab->$otherTable()->associate($".$otherTable.")->save();" !!}
    {!! "return back();" !!}
{!! "}" !!}