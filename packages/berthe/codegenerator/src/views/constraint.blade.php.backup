@extends('constraintMaster')
@section('constraints') @foreach($tbs as $tabName => $table)@if(array_key_exists('relations', $table))@foreach($table['relations'] as $relationType => $tables)@if($relationType == "belongsTo")
{!! 'Schema::table(\''.$tabName.'\', function(Blueprint $table) {'!!}
            @foreach($tables as $tab){!!'$table->integer(\''.$tab.'_id\')->unsigned()->index();'!!}
            {!!'$table->foreign(\''.$tab.'_id\')->references(\'id\')->on(\''.$tab.'\')->onDelete(\'cascade\')->onUpdate(\'cascade\');'!!}
@endforeach
         {!! '});' !!}
@endif
@endforeach
@endif
@endforeach
@endsection

@section('dropTables') @foreach($tbs as $tabName => $table)@if(array_key_exists('relations', $table))@foreach($table['relations'] as $relationType => $tables)@if($relationType == "belongsTo"){!! 'Schema::table(\''.$tabName.'\', function(Blueprint $table) {'!!}
    @foreach($tables as $tab)       {!!'$table->dropForeign(\''.$tabName.'_'.$tab.'_id_foreign\');'!!}
    @endforeach
    {!! '});' !!}
@endif
@endforeach
@endif
@endforeach

@endsection