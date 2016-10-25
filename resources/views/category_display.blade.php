@extends('master')
@section('content')
<h1 class="text-danger">Display Category</h1>

<a href="{{url("/category/$category->category_id")}}/edit">Edit</a></br>

 <label class="text-danger">Category_id : </label>
<p>{{$category->category_id}}</p>
  <label class="text-danger">Name : </label>
<p>{{$category->name}}</p>
   
    @if(isset($category->film))
    <h1 class="text-danger">List of Films</h1>
<table class="table">
    <thead>
              <th>Title</th>
             <th>Description</th>
             <th>Release year</th>
              <th>Rental duration</th>
             <th>Rental rate</th>
             <th>Length</th>
             <th>Replacement cost</th>
            </thead>
@forelse($category->film as  $film)
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
    <td>No film for category</td>
@endforelse
</table>    @else
        <label class="text-danger">No category.</label>
    @endif
@endsection