    <h1 class="text-danger">Display {{ucfirst($table['title'])}}</h1>

    <a href="S2BOBRACKET{!!"url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"!!}S2BCBRACKET/edit">Edit</a></br>

    <br/>


    @foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable())

        <div class="form-group">
            <label class="text-danger text-md">{{ucfirst($attrType->getColumnText())}} : </label>
            @if($attrType->hasUnit())
                <div class="input-group mb-md">
                    <span class="input-group-addon">{{$attrType->getUnit()}}</span>
                    {!! $attrType->getForm("S2BOBRACKET$".$table['title'].'->'.$attrName."S2BCBRACKET", false)!!}
                </div>
            @else {!! $attrType->getForm("S2BOBRACKET$".$table['title'].'->'.$attrName."S2BCBRACKET", false)!!} @endif
        </div>
    @endif @endforeach


    @if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table['relations'] as $relation)
        S3Bif(isset(${!! $relation->getTable()."->".$relation->getOtherTable()!!}))
        @include($relation->getEditView(), ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs, "config" => $config, "type" => \Berthe\Codegenerator\Utils\Variable::$DISPLAY_VIEW])

        S3Belse
        @if($relation->isBelongsTo())
            @include("simpleBelongTo", ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs, "config" => $config])
        @elseif($relation->isBelongsToMany())
            @include("simpleBelongToMany", ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs, "config" => $config])
        @endif
        S3Bendif
    @endforeach @endif


    @if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table['relations'] as $relation)

    S3Bif(isset(${!!$table['title'].'->'.$relation->getOtherTable()!!}))
        @include(/*$relation->getDisplayView()*/"mockup", ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs])
    S3Belse
        <label class="text-danger text-md">No {{$relation->getOtherTable()}} related to this {{$relation->getTable()}}.</label>
    S3Bendif
    @endforeach @endif