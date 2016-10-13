@extends('master')
@section('content')
<h1 class="text-danger">Edit Language</h1>
<form method="post" action="language/{{$language->language_id}}">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="">
    <div class="form-group">
        <label class="text-danger">Name : </label>
        
        Current Value : {{$language->name}}
    </div>

   
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Update" />
    </div>
</form>

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