@if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table['relations'] as $relation)
        S3Bif(isset(${!!$table['title'].'->'.$relation->getOtherTable()!!}) && "{!! $relation->getOtherTable() !!}" == $table)
            @include($relation->getDisplayView(), ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs, "config" => $config])
        S3Belse

        S3Bendif
@endforeach @endif