{!! "request()->session()->forget(\"sortKey\");" !!}
{!! "request()->session()->forget(\"sortOrder\");" !!}
{!!"if(!request()->exists('tab')){" !!}
${!! $table['title'].'s = ' !!}{!! ucfirst($table['title'])."::query();" !!}
@foreach($table['attributs'] as $attrName => $attrType)@if($attrType->isDisplayable())
    {!!"if(request()->exists('$attrName')){" !!}
    ${!! $table['title'].'s = ' !!}${!! $table['title']."s->orderBy('$attrName', $"."this->getOrder('$attrName'));" !!}
    ${!! 'path = ' !!}{!! "\"$attrName\";" !!}
    {!! "}else{" !!}
    {!! "request()->session()->forget(\"$attrName\");" !!}
    {!! "}" !!}
@endif @endforeach
${!! $table['title'].'s = ' !!}${!! $table['title'].'s->paginate(20);' !!}
${!! $table['title']."s->setPath(\"sort?$"."path\");"!!}
{!! "return view('".$table['title']."_show', compact('".$table['title']."s'));" !!}

{!! "}else{" !!}

@if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table["relations"] as $relation)  {!!"if(request()->exists('tab') == '".$relation->getOtherTable()."'){" !!}

@foreach($tbs[$relation->getOtherTable()]['attributs'] as $attrName => $attrType)@if($attrType->isDisplayable())
    {!!"if(request()->exists('$attrName')){" !!}
    {!! "session(['sortOrder' => $"."this->getOrder('$attrName')]);" !!}
    {!! "session(['sortKey' => '$attrName']);" !!}
    {!! "}else{" !!}
    {!! "request()->session()->forget(\"$attrName\");" !!}
    {!! "}" !!}

@endif @endforeach

{!! "}" !!}
@endforeach @endif
{!! "return back();" !!}
{!! "}" !!}