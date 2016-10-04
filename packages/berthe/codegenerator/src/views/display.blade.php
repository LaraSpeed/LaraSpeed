<h1>Affichage {{$table['title']}}</h1>

@foreach($table['attributs'] as $attrName => $attrType) @if($attrType->isDisplayable())
<label class="text-danger">{{ucfirst($attrName)}} : </label>
<p>S2BOBRACKET${!! $table['title'].'->'.$attrName!!}S2BCBRACKET</p>
@endif @endforeach