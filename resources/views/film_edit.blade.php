@extends('master')
@section('content')
<h1 class="text-danger">Edit Film</h1>
<form method="post" action="film/{{$film->film_id}}">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="">
      <div class="form-group">
        <label class="text-danger">Title : </label>
        <input type ="text" class="form-control" name="title" placeholder="Title" />
        Current Value : {{$film->title}}
    </div>

   <div class="form-group">
        <label class="text-danger">Description : </label>
        <textarea name="description" rows="4" cols="20" class="form-control"></textarea>
        Current Value : {{$film->description}}
    </div>

   <div class="form-group">
        <label class="text-danger">Release_year : </label>
        
        Current Value : {{$film->release_year}}
    </div>

   <div class="form-group">
        <label class="text-danger">Original_language_id : </label>
        <input type ="number" class="form-control" name="original_language_id" placeholder="Original_language_id" />
        Current Value : {{$film->original_language_id}}
    </div>

   <div class="form-group">
        <label class="text-danger">Rental_duration : </label>
        <input type ="number" class="form-control" name="rental_duration" placeholder="Rental_duration" />
        Current Value : {{$film->rental_duration}}
    </div>

   <div class="form-group">
        <label class="text-danger">Rental_rate : </label>
        <input type ="number" class="form-control" name="rental_rate" placeholder="Rental_rate" />
        Current Value : {{$film->rental_rate}}
    </div>

     <div class="form-group">
        <label class="text-danger">Replacement_cost : </label>
        <input type ="number" class="form-control" name="replacement_cost" placeholder="Replacement_cost" />
        Current Value : {{$film->replacement_cost}}
    </div>

       
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Update" />
    </div>
</form>

    <h3 class="text-danger">Language : </h3>
     {{$film->language->name}}
      <h1 class="text-danger">List of Category</h1>
<table class="table">
    <thead>
            <th>Category_id</th>
             <th>Name</th>
          </thead>
@forelse($film->category as  $category)
    <tbody>
            <td>{{$category->category_id}}</td>
             <td>{{$category->name}}</td>
          </tbody>
@empty
    <td>No category for film</td>
@endforelse
</table>@endsection