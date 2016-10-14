@extends('controllerMaster')

@section('modelNamespace'){{ucfirst($table['title'])}}@endsection

@section('controllerName'){{ucfirst($table['title'])."Controller"}}@endsection

@section('viewName'){{$table['title']}}@endsection

@section('varID'){{$table['title'].'s'}}@endsection

@section('modelCall'){{ucfirst($table['title']).'::all()'}}@endsection

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
