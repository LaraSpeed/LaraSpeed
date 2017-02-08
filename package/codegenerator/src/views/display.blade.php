    <h1 class="text-danger">Display {{ucfirst($table['title'])}}</h1>

    <a href="S2BOBRACKET{!!"url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"!!}S2BCBRACKET/edit">Edit</a></br>

    <br/>

    @foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable())

    <label class="text-primary">{{ucfirst($attrName)}} : </label>
    <p>S2BOBRACKET${!! $table['title'].'->'.$attrName!!}S2BCBRACKET</p>

    @endif @endforeach

    @if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table['relations'] as $relation)

    S3Bif(isset(${!!$table['title'].'->'.$relation->getOtherTable()!!}))
        @include(/*$relation->getDisplayView()*/"mockup", ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs])
    S3Belse
        <label class="text-danger">No {{$relation->getOtherTable()}} related to this {{$relation->getTable()}}.</label>
    S3Bendif
    @endforeach @endif