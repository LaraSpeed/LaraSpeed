<h1 class="text-danger">Edit {{ucfirst($table['title'])}}</h1>
<form method="post" action="S2BOBRACKET{!! "url(\"".$table['title']."/$".$table['title']."->".$table['id']."\")" !!}S2BCBRACKET">
    {{ method_field('PUT') }}
    <input type="hidden" name="_token" value="S2BOBRACKET csrf_token() S2BCBRACKET">
@foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable()) <div class="form-group">
        <label class="text-danger">{{ucfirst($attrName)}} : </label>
        {!! $attrType->getForm()!!}
        Current Value : S2BOBRACKET${!! $table['title'].'->'.$attrName!!}S2BCBRACKET
    </div>

@endif @endforeach

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Update" />
    </div>
</form>

@foreach($table['relations'] as $relation)
    S3Bif(isset(${!!$table['title'].'->'.$relation->getOtherTable()!!}))
    @include($relation->getDisplayView(), ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs])
    S3Belse
    <label class="text-danger">No {{$relation->getTable()}}.</label>
    S3Bendif
@endforeach