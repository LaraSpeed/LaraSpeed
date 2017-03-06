${!! $table['title'].'s = ' !!}{!! ucfirst($table['title'])."::where('".$table['id']."', 'like', $"."keyword)" !!}
@foreach($table['attributs'] as $attrName => $attrType)     {!!"->orWhere('$attrName', 'like', $"."keyword)" !!}

@endforeach
{!! '->paginate(20);' !!}

${!! $table['title']."s->setPath(\"search?keyword=$"."keyword\");"!!}
{!! "return view('".$table['title']."_show', compact('".$table['title']."s'));" !!}