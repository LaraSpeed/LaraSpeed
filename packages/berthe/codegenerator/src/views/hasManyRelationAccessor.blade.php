    {!! "function get".(Berthe\Codegenerator\Utils\Helper::camelize($otherTable))."PaginatedAttribute(){" !!}
        {!! "if(session(\"sortKey\", \"none\") == \"none\")" !!}
            {!! "return $"."this->".$otherTable."()->paginate(20)->appends(array(\"tab\" => \"$otherTable\"));" !!}

        {!! "return $"."this->".$otherTable."()->orderBy(session(\"sortKey\", \"".$config->displayedAttributes($otherTable)."\"), session(\"sortOrder\", \"asc\"))->paginate(20)->appends(array(\"tab\" => \"$otherTable\"));" !!}

    {!! "}" !!}