${!! "data = request()->all();" !!}

${!! $table['title']." = " !!}{!! ucfirst($table['title'])."::create([" !!}
@foreach($table['attributs'] as $attrName => $attrType)@if($attrType->isDisplayable())@if(!$attrType->isBoolean())
    {!! "\"$attrName\" => $"."data[\"$attrName\"]," !!}
@else {!! "\"$attrName\" => ($"."data[\"$attrName\"] == 'on' ? 1:0)," !!} @endif
@endif @endforeach
{!! "]);" !!}

@if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table["relations"] as $relation)@if($relation->isBelongsTo())
    {!! "if(request()->exists('".$relation->getOtherTable()."')){" !!}
    ${!! $relation->getOtherTable()." = " !!}{!! ucfirst($relation->getOtherTable())."::find(request()->get('".$relation->getOtherTable()."'));" !!}
    ${!! $table['title']."->".$relation->getOtherTable()."()->associate($".$relation->getOtherTable().")->save();" !!}
    {!! "}" !!}

@elseif($relation->isBelongsToMany())
    {!! "if(request()->exists('".$relation->getOtherTable()."')){" !!}
    ${!! $table['title']."->".$relation->getOtherTable()."()->attach($"."data[\"".$relation->getOtherTable()."\"]);" !!}
    {!! "}" !!}
@endif @endforeach @endif