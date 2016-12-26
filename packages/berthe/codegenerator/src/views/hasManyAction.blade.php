    {!! "function add".ucfirst($otherTable)."(".ucfirst($tab)." $"."$tab ){" !!}
        ${!! "newOnes = ".ucfirst($otherTable)."::find(request()->get('film'));" !!}

        {!! "foreach ($"."newOnes as $"."newOne){" !!}
            ${!! "$tab->$otherTable()->save($"."newOne);"!!}
        {!! "}" !!}

        {!! "return back();" !!}
    {!! "}" !!}