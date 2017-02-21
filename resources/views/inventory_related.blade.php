@extends('master')
@section('content')
@if(isset($inventory->film) && "film" == $table)
            <h3 class="text-danger">Film : </h3>
      {{$inventory->film->title}}
     {{$inventory->film->description}}
     {{$inventory->film->release_year}}
      {{$inventory->film->rental_duration}}
     {{$inventory->film->rental_rate}}
     {{$inventory->film->length}}
     {{$inventory->film->replacement_cost}}
            @else

        @endif
        @if(isset($inventory->store) && "store" == $table)
            <h3 class="text-danger">Store : </h3>
           @else

        @endif
 @endsection