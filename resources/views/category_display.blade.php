@extends('master')
@section('content')
<h1 class="text-danger">Display Category</h1>

 <label class="text-danger">Category_id : </label>
<p>{{$category->category_id}}</p>
  <label class="text-danger">Name : </label>
<p>{{$category->name}}</p>
   
    <h1 class="text-danger">List of Film</h1>
<table class="table">
    <thead>
              <th>Title</th>
             <th>Description</th>
             <th>Release_year</th>
             <th>Original_language_id</th>
             <th>Rental_duration</th>
             <th>Rental_rate</th>
              <th>Replacement_cost</th>
            </thead>
@forelse($category->film as  $film)
    <tbody>
              <td>{{$film->title}}</td>
             <td>{{$film->description}}</td>
             <td>{{$film->release_year}}</td>
             <td>{{$film->original_language_id}}</td>
             <td>{{$film->rental_duration}}</td>
             <td>{{$film->rental_rate}}</td>
              <td>{{$film->replacement_cost}}</td>
            </tbody>
@empty
    <td>No film for category</td>
@endforelse
</table>@endsection