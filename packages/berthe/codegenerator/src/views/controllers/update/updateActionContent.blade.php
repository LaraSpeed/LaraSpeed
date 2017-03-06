${!! "data = request()->all();" !!}

${!! "updateFields = array();" !!}
@foreach($table['attributs'] as $attrName => $attrType)@if($attrType->isDisplayable())@if(!$attrType->isBoolean())
    ${!! "updateFields["."\"$attrName\"] = $"."data[\"$attrName\"];" !!}
@else
    ${!! "updateFields["."\"$attrName\"] = $"."data[\"$attrName\"] == \"on\"?1:0;" !!}
@endif @endif @endforeach

${!! $table['title']."->update($"."updateFields);" !!}

@if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table["relations"] as $relation)@if($relation->isBelongsTo())
    {!! "if(request()->exists('".$relation->getOtherTable()."')){" !!}
    ${!! $relation->getOtherTable()." = " !!}{!! "\\App\\".ucfirst($relation->getOtherTable())."::find(request()->get('".$relation->getOtherTable()."'));" !!}
    ${!! $table["title"]."->".$relation->getOtherTable()."()->associate($".$relation->getOtherTable().")->save();" !!}
    {!! "}" !!}

@elseif($relation->isBelongsToMany())
    {!! "if(request()->exists('".$relation->getOtherTable()."')){" !!}
    ${!! $table["title"]."->".$relation->getOtherTable()."()->sync(request()->get('".$relation->getOtherTable()."'));" !!}
    {!! "}" !!}

@elseif($relation->isHasMany())
    {!! "if(request()->exists('".$relation->getOtherTable()."')){" !!}

    ${!! "newOnes = \\App\\".ucfirst($relation->getOtherTable())."::find(request()->get('".$relation->getOtherTable()."'));" !!}

    {!! "foreach ($"."newOnes as $"."newOne){" !!}
    ${!! $table["title"]."->".$relation->getOtherTable()."()->save($"."newOne);"!!}
    {!! "}" !!}

    {!! "}" !!}
@endif @endforeach @endif


