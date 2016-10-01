@section('typeFichier')  @endsection
@extends('modelMaster')

@section('namespace'){{'App'}}@endsection

@section('modelName'){{ucfirst($table['title'])}}@endsection

@section('tableName'){{$table['title']}}@endsection

@section('attributs')@if(array_key_exists('attributs', $table))@foreach($table['attributs'] as $attrName => $attrVal){!! "\"$attrName\", "!!}@endforeach @endif
@endsection

@section('relations')@if(array_key_exists('relations', $table))@foreach($table['relations'] as $relationType => $tab1)@foreach($tab1 as $tab){{"function $tab(){ "}}
       {!!'return $this->'.$relationType.'(\'App\\'.ucfirst($tab).'\');'!!}
    {{"}"}}
@endforeach @endforeach @endif

@endsection