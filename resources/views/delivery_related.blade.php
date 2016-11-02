@extends('master')
@section('content')
@if(isset($delivery->film))
        @else
    <label class="text-danger">No delivery.</label>
    @endif
@endsection