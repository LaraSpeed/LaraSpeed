<h1 class="text-danger">Display {{ucfirst($table['title'])}}</h1>

<a href="S2BOBRACKET{!!"url(\"/".$table['title']."/$".$table['title'].'->'.$table['id']."\")"!!}S2BCBRACKET/edit">Edit</a></br>

@foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable())
<label class="text-danger">{{ucfirst($attrName)}} : </label>
<p>S2BOBRACKET${!! $table['title'].'->'.$attrName!!}S2BCBRACKET</p>
@endif @endforeach

@foreach($table['relations'] as $relation)
    @include($relation->getDisplayView(), ["tab" => $relation->getTable(), "otherTable" => $relation->getOtherTable(), "tbs" => $tbs])
@endforeach