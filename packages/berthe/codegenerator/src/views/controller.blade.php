@extends('controllerMaster')

@section('modelNamespace'){{ucfirst($table['title'])}}@endsection

@section('controllerName'){{ucfirst($table['title'])."Controller"}}@endsection

@section('viewName'){{$table['title']}}@endsection

@section('varID'){{$table['title'].'s'}}@endsection

@section('modelCall'){!!ucfirst($table['title']).'::paginate(20)'!!}@endsection

@section('createView'){{$table['title']}}@endsection

@section('storeVar'){{$table['title']}}@endsection

@section('ModelName1'){{ucfirst($table['title'])}}@endsection

@section('storeVar1'){{$table['title']}}@endsection

@section('object'){{ucfirst($table['title']).' $'.$table['title']}} @endsection
<?php $tb = array(); ?>
@section('show')@if(key_exists("relations", $table))@foreach($table["relations"] as $relation)<?php $tb[] = $relation->getOtherTable() ?>@endforeach
@include($relation->getActionView(), ['tab' => $relation->getTable(), 'otherTable' => $relation->getOtherTable(), 'args' => Berthe\Codegenerator\Utils\Helper::createStringArray($tb)])

        @include("showReturnValController", ['tab' => $relation->getTable(), "type" => "display"])
    @endif
@endsection

@section('editParam'){{ucfirst($table['title']).' $'.$table['title']}} @endsection
<?php $tb = array(); ?>
@section('edit')@if(key_exists("relations", $table))@foreach($table["relations"] as $relation)<?php $tb[] = $relation->getOtherTable() ?>@endforeach
@include($relation->getActionView(), ['tab' => $relation->getTable(), 'otherTable' => $relation->getOtherTable(), 'args' => Berthe\Codegenerator\Utils\Helper::createStringArray($tb)])

        @include("showReturnValController", ['tab' => $relation->getTable(), "type" => "edit"])
@endif
@endsection

@section('updateParam'){{ucfirst($table['title']).' $'.$table['title']}} @endsection
@section('update')
    ${!! $table['title']."->update(request()->all());" !!}
@endsection

@section('deleteParam'){{ucfirst($table['title']).' $'.$table['title']}} @endsection
@section('delete')
    ${!! $table['title']."->delete();" !!}
@endsection

@section('relatedParam'){{ucfirst($table['title']).' $'.$table['title']}} @endsection
<?php $tb = array(); ?>
@section('related')@if(key_exists("relations", $table))@foreach($table["relations"] as $relation)<?php $tb[] = $relation->getOtherTable() ?>@endforeach
@include($relation->getActionView(), ['tab' => $relation->getTable(), 'otherTable' => $relation->getOtherTable(), 'args' => Berthe\Codegenerator\Utils\Helper::createStringArray($tb)])

@include("showReturnValController", ['tab' => $relation->getTable(), "type" => "related"])
@endif
@endsection

@section('search')
${!! $table['title'].'s = ' !!}{!! ucfirst($table['title'])."::where('".$table['id']."', 'like', $"."keyword)" !!}
    @foreach($table['attributs'] as $attrName => $attrType)     {!!"->orWhere('$attrName', 'like', $"."keyword)" !!}

    @endforeach
    {!! '->paginate(20);' !!}
    ${!! $table['title']."s->setPath(\"search?keyword=$"."keyword\");"!!}
    {!! "return view('".$table['title']."_show', compact('".$table['title']."s'));" !!}
@endsection

@section('sort')
${!! $table['title'].'s = ' !!}{!! ucfirst($table['title'])."::query();" !!}
    @foreach($table['attributs'] as $attrName => $attrType)
    {!!"if(request()->exists('$attrName')){" !!}
            ${!! $table['title'].'s = ' !!}${!! $table['title']."s->orderBy('$attrName', $"."this->getOrder('$attrName'));" !!}
            ${!! 'path = ' !!}{!! "\"$attrName\";" !!}
        {!! "}" !!}
    @endforeach
    ${!! $table['title'].'s = ' !!}${!! $table['title'].'s->paginate(20);' !!}
        ${!! $table['title']."s->setPath(\"sort?$"."path\");"!!}
        {!! "return view('".$table['title']."_show', compact('".$table['title']."s'));" !!}
@endsection
