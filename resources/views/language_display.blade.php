@extends('master')
@section('content')
<h1 class="text-danger">Display Language</h1>

<a href="{{url("/language/$language->language_id")}}/edit">Edit</a></br>

   <label class="text-danger">Name : </label>
<p>{{$language->name}}</p>
   
    <h1 class="text-danger">List of Films</h1>
<table class="table">
    <thead>
              <th>Title</th>
             <th>Description</th>
               <th>Rental_duration</th>
             <th>Rental_rate</th>
              <th>Replacement_cost</th>
            </thead>
@forelse($language->film as  $film)
    <tbody>
              <td>{{$film->title}}</td>
             <td>{{$film->description}}</td>
               <td>{{$film->rental_duration}}</td>
             <td>{{$film->rental_rate}}</td>
              <td>{{$film->replacement_cost}}</td>
            </tbody>
@empty
    <td>No film for language</td>
@endforelse
</table>@endsection