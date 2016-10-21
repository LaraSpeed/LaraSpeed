@extends('master')
@section('content')
<h1 class="text-danger">Edit Film</h1>
<form method="post" action="{{url("film/$film->film_id")}}">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
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
        <input type ="number" class="form-control" name="release_year" placeholder="Release_year" />
        Current Value : {{$film->release_year}}
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
        <label class="text-danger">Length : </label>
        <input type ="number" class="form-control" name="length" placeholder="Length" />
        Current Value : {{$film->length}}
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

    <h3>Update Language</h3>
<form action="" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <select class="form-control" name="language">
        @forelse(\App\Language::all() as  $language)
        <option value="{{$language->language_id}}">
                             {{$language->name}}
                      </option>
        @empty
        <option value="-1">No language</option>
        @endforelse
    </select>

    <input type="submit"  class="btn btn-primary" value="Update"/>
</form>
    @if(isset($film->category))
    <h3>Associate Category</h3>
<form action="{{url("/film/addCategory/$film->film_id")}}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <select class="form-control" name="category">
        @forelse(\App\Category::all() as  $category)
        <option value="{{$category->category_id}}">
                            {{$category->category_id}}
                             {{$category->name}}
                      </option>
        @empty
        <option value="-1">No category</option>
        @endforelse
    </select>

    <input type="submit"  class="btn btn-primary" value="Associate"/>
</form>    @else
    <label class="text-danger">No film.</label>
    @endif
@endsection