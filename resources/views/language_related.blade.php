@extends('master')
@section('content')
@if(isset($language->film))
    <h1 class="text-danger">List of Films</h1>
<table class="table">
    <thead>
              <th class="c_string">Title</th>
             <th class="c_text">Description</th>
             <th class="c_numeric">Release<br/>year</th>
              <th class="c_numeric">Rental<br/>duration</th>
             <th class="c_numeric">Rental<br/>rate</th>
             <th class="c_numeric">Length</th>
             <th class="c_numeric">Replacement<br/>cost</th>
            </thead>
@forelse($language->film as  $film)
    <tbody>
              <td class="c_string">{{$film->title}}</td>
             <td class="c_text">{{$film->description}}</td>
             <td class="c_numeric">{{$film->release_year}}</td>
              <td class="c_numeric">{{$film->rental_duration}}</td>
             <td class="c_numeric">{{$film->rental_rate}}</td>
             <td class="c_numeric">{{$film->length}}</td>
             <td class="c_numeric">{{$film->replacement_cost}}</td>
            </tbody>
@empty
    <td>No film for language</td>
@endforelse
</table>    @else
    <label class="text-danger">No language.</label>
    @endif
@endsection