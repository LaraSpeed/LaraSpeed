@extends("authserviceproviderMaster")

@section("registerPolicies")
@foreach ($tbs as $tableName => $table) '{!! "App\\".ucfirst($tableName)."' => 'App\\Policies\\".ucfirst($tableName)."Policy" !!}',
@endforeach
@endsection