@section('typeFichier')  @endsection
@extends('modelMaster')

@section('namespace') @include("models.namespaces") @endsection

@section('modelName') @include("models.name", ["table" => $table]) @endsection

@section('col_id') @include("models.id", ["table" => $table]) @endsection

@section('tableName') @include("models.table", ["table" => $table]) @endsection

@section('attributs') @include("models.attributs", ["table" => $table]) @endsection

@section('relations') @include("models.relations", ["table" => $table]) @endsection

@section('accessors') @include("models.accessors", ["table" => $table, "config" => $config]) @endsection
