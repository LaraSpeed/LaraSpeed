@extends('master')
@section('content')
@if(isset($film->director) && "director" == $table)
            <h3 class="text-danger">Director : </h3>
     {{$film->director->name}}
     {{$film->director->birth}}
     {{$film->director->bio}}
         @else

        @endif
 @endsection