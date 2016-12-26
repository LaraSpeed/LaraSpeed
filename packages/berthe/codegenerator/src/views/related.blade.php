@foreach($table['relations'] as $relation)
        S3Bif(isset(${!!$table['title'].'->'.$relation->getOtherTable()!!}) && "{!! $relation->getOtherTable() !!}" == $table)
            @include($relation->getDisplayView(), ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs])
        S3Belse

        S3Bendif
@endforeach