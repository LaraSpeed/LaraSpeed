@extends('constraintMaster')
@section('constraints')@foreach($tbs as $tabName => $table)@if(array_key_exists('relations', $table) && !empty($table['relations']))
        {!! 'Schema::table(\''.$tabName.'\', function(Blueprint $table) {'!!}
@foreach($table['relations'] as $relationType)@if($relationType->hasConstraint())@include($relationType->getForeignConstraintView(), ['tab' => $relationType->getOtherTable(), 'tbs' => $tbs])
@endif
@endforeach

        {!! '});' !!}

@endif
@endforeach
@endsection

@section('dropTables')@foreach($tbs as $tabName => $table)@if(array_key_exists('relations', $table) && !empty($table["relations"]))
        {!! 'Schema::table(\''.$tabName.'\', function(Blueprint $table) {'!!}
    @foreach($table['relations'] as $relationType)@if($relationType->hasConstraint())
            @include($relationType->getDropTableConstraintView(), ['tabName' => $tabName, 'tab' => $relationType->getOtherTable()])
@endif
@endforeach

        {!! '});' !!}

@endif
@endforeach

@endsection