    <h1 class="text-danger">Edit {{ucfirst($table['title'])}}</h1>
    <form method="post" action="S2BOBRACKET{!! "url(\"".$table['title']."/$".$table['title']."->".$table['id']."\")" !!}S2BCBRACKET">
        {{ method_field('PUT') }}
        <input type="hidden" name="_token" value="S2BOBRACKET csrf_token() S2BCBRACKET" />
        @foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable())

        <div class="form-group">
            <label class="text-danger">{{ucfirst(str_replace("_", " ", $attrName))}} : </label>
            {!! $attrType->getForm("S2BOBRACKET$".$table['title'].'->'.$attrName."S2BCBRACKET")!!}
        </div>
        @endif @endforeach

        @if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table['relations'] as $relation)
    S3Bif(isset(${!! $relation->getTable()."->".$relation->getOtherTable()!!}))
        @include($relation->getEditView(), ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs, "config" => $config])

    S3Belse
        @if($relation->isBelongsTo())
            @include("simpleBelongTo", ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs, "config" => $config])
        @elseif($relation->isBelongsToMany())
            @include("simpleBelongToMany", ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs, "config" => $config])
        @endif
    S3Bendif
    @endforeach @endif

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>