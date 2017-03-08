@extends('controllerMaster')

@section('modelNamespace'){{ucfirst($table['title'])}}@endsection

@section('namespaces')
    @if(key_exists("relations", $table) && !empty($table["relations"]))@foreach($table["relations"] as $relation){!! "use App\\".ucfirst($relation->getOtherTable()).";" !!}

    @endforeach @endif
@endsection

@section('controllerName'){{ucfirst($table['title'])."Controller"}}@endsection

@section('viewName'){{$table['title']}}@endsection

@section('varID'){{$table['title'].'s'}}@endsection

@section('modelCall'){!!ucfirst($table['title']).'::paginate(20)'!!}@endsection

@section('createView') @include("controllers.create.createAction", ["table" => $table]) @endsection

@section('storeContent') @include("controllers.store.storeActionContent", ["table" => $table]) @endsection

@section('store') @include("controllers.store.storeActionReturnValue", ["table" => $table]) @endsection

@section('object') @include("controllers.show.showActionParam", ["table" => $table]) @endsection
<?php $tb = array(); ?>
@section('show') @include("controllers.show.showActionContent", ["table" => $table]) @endsection

@section('editParam') @include("controllers.edit.editActionParam", ["table" => $table]) @endsection
<?php $tb = array(); ?>
@section('edit') @include("controllers.edit.editActionContent", ["table" => $table]) @endsection

@section('updateParam') @include("controllers.update.updateActionParam", ["table" => $table]) @endsection
@section('update') @include("controllers.update.updateActionContent", ["table" => $table]) @endsection

@section('deleteParam') @include("controllers.delete.deleteActionParam", ["table" => $table]) @endsection
@section('delete') @include("controllers.delete.deleteActionContent", ["table" => $table]) @endsection

@section('relatedParam') @include("controllers.related.relatedActionParam", ["table" => $table]) @endsection
<?php $tb = array(); ?>
@section('related') @include("controllers.related.relatedActionContent", ["table" => $table, "config" => $config]) @endsection

@section('search') @include("controllers.search.searchContent", ["table" => $table]) @endsection

@section('sort') @include("controllers.sort.sortActionContent", ["table" => $table, "config" => $config]) @endsection

@section('relations') @include("controllers.relations.relationActionsContent", ["table" => $table, "config" => $config]) @endsection
