@section('typeFichier')  @endsection
@extends('modelMaster')

@section('namespace'){{'App'}}@endsection

@section('modelName'){{ucfirst($table['title'])}}@endsection

@section('col_id'){{$table['id']}}@endsection

@section('tableName'){{$table['title']}}@endsection

@section('attributs')@if(array_key_exists('attributs', $table))@foreach($table['attributs'] as $attrName => $attrVal){!! "\"$attrName\", "!!}@endforeach @endif
@endsection

@section('relations')@if(array_key_exists('relations', $table) && !empty($table["relations"]))@foreach($table['relations'] as $relationType)
    @include($relationType->getModelView(), ["type" => $relationType->getType(), "tab" => $relationType->getOtherTable(), "table" => $relationType->getTable()])

@endforeach @endif
@endsection

@section('accessors')@if(array_key_exists('attributs', $table))@foreach($table['attributs'] as $attrName => $attrType)@if($attrType->isDisplayable())@include($attrType->mutator(), ['attrName' => $attrName, 'length' => 40]) @endif
@endforeach @endif

@if(array_key_exists('relations', $table) && !empty($table["relations"]))@foreach($table['relations'] as $relationType)
    @include($relationType->getRelationAccessor(), ["table" => $relationType->getTable(), "otherTable" => $relationType->getOtherTable(), "config" => $config, "tbs" => $tbs])

@endforeach @endif
@endsection
