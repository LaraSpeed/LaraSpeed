@if(array_key_exists('relations', $table) && !empty($table["relations"]))@foreach($table['relations'] as $relationType)
    @include($relationType->getModelView(), ["type" => $relationType->getType(), "tab" => $relationType->getOtherTable(), "intermediate" => $relationType->getIntermediateTable(), "table" => $relationType->getTable()])

@endforeach @endif