@extends('master')
@section('content')
<h1 class="text-danger">Display Language</h1>

<a href="{{url("/language/$language->language_id")}}/edit">Edit</a></br>

   <label class="text-danger">Name : </label>
<p>{{$language->name}}</p>
   
    @if(isset($language->film))
    <h1 class="text-danger">List of Films</h1>
<table class="table">
    <thead>
              <th>Title</th>
             <th>Description</th>
             <th>Release_year</th>
              <th>Rental_duration</th>
             <th>Rental_rate</th>
             <th>Length</th>
             <th>Replacement_cost</th>
            </thead>
@forelse($language->film as  $film)
    <tbody>
              <td>{{$film->title}}</td>
             <td>{{$film->description}}</td>
             <td>{{$film->release_year}}</td>
              <td>{{$film->rental_duration}}</td>
             <td>{{$film->rental_rate}}</td>
             <td>{{$film->length}}</td>
             <td>{{$film->replacement_cost}}</td>
            </tbody>
@empty
    <td>No film for language</td>
@endforelse
</table>    @else
        <label class="text-danger">No language.</label>
    @endif
@endsection