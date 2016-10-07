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
@section('show')@if(key_exists("relations", $table)) @foreach($table["relations"] as $relation) <?php $tb[] = $relation->getOtherTable() ?> @endforeach
@include($relation->getActionView(), ['tab' => $relation->getTable(), 'otherTable' => $relation->getOtherTable(), 'args' => Berthe\Codegenerator\Utils\Helper::createStringArray($tb)])
@include("showReturnValController", ['tab' => $relation->getTable()])
    @endif
@endsection

@section('deleteCall'){{ucfirst($table['title']).'::delete($id)'}}@endsection