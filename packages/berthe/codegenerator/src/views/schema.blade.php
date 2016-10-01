@extends('schemaMaster')

@section('schemaClassName'){{'Create'.ucfirst($table['title']).'Table'}}@endsection

@section('createTable'){{$table['title']}}@endsection

@section('fields')@if(array_key_exists('attributs', $table))@foreach($table['attributs'] as $attrName => $attrType)@if(is_integer($attrType) or is_int($attrType)){!! '$table->integer(\''.$attrName.'\');' !!}@elseif(is_string($attrType)){!! '$table->string(\''.$attrName.'\');' !!}
            @endif @endforeach
            @endif
@endsection

@section('dropTable'){{$table['title']}}@endsection