<h1 class="text-danger">Edit {{ucfirst($table['title'])}}</h1>
<form method="post" action="{!! $table['title']."/S2BOBRACKET$".$table['title']."->".$table['id']."S2BCBRACKET" !!}">
    {{ method_field('PUT') }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
    @include($relation->getDisplayView(), ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs])
@endforeach