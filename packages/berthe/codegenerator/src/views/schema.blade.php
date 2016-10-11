@extends('schemaMaster')

@section('schemaClassName'){{'Create'.ucfirst($table['title']).'Table'}}@endsection

@section('createTable'){{$table['title']}}@endsection

@section('fields')@if(array_key_exists('attributs', $table))@foreach($table['attributs'] as $attrName => $attrType)
            {!! '$table->'.$attrType->getDBFunction().';' !!}
@endforeach
@endif
@endsection

@section('dropTable'){{$table['title']}}@endsection