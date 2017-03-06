@if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table["relations"] as $relation)
    @include($relation->getAction(), ['tab' => $relation->getTable(), 'otherTable' => $relation->getOtherTable(), 'tbs' => $tbs])

@endforeach @endif