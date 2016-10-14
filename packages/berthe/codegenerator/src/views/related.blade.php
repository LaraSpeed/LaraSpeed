@foreach($table['relations'] as $relation)
    S3Bif(isset(${!!$table['title'].'->'.$relation->getOtherTable()!!}))
    @include($relation->getDisplayView(), ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs])
    S3Belse
    <label class="text-danger">No {{$relation->getTable()}}.</label>
    S3Bendif
@endforeach