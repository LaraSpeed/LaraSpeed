    {!! "function get".(Berthe\Codegenerator\Utils\Helper::camelize($otherTable))."PaginatedAttribute(){" !!}
        ${!! "$otherTable =" !!} ${!! "this->".$otherTable."();" !!}
        {!! "if(session(\"keyword\", \"none\") != \"none\"){" !!}
            ${!! "key = \"%\".session('keyword','').\"%\";" !!}
            ${!! "$otherTable"."->where('".$config->displayedAttributes($otherTable)."', 'like', $"."key)" !!}
        @if(array_key_exists('attributs', $tbs[$otherTable]))@foreach($tbs[$otherTable]['attributs'] as $attrName => $attrVal)@if($attrVal->isDisplayable()and $attrName != $config->displayedAttributes($otherTable))
    {!! "->orWhere('$attrName', 'like', $"."key)" !!}
     @endif @endforeach @endif {!! ";" !!}

        {!! "}" !!}

        {!! "if(session(\"sortKey\", \"none\") == \"none\" or !Schema::hasColumn(\"$otherTable\", session(\"sortKey\", \"none\")))" !!}
            {!! "return $".$otherTable."->paginate(20)->appends(array(\"tab\" => \"$otherTable\"));" !!}

        {!! "return $".$otherTable."->orderBy(session(\"sortKey\", \"".$config->displayedAttributes($otherTable)."\"), session(\"sortOrder\", \"asc\"))->paginate(20)->appends(array(\"tab\" => \"$otherTable\"));" !!}

    {!! "}" !!}
