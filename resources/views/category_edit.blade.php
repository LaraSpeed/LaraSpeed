@extends('master')
@section('content')
<h1 class="text-danger">Edit Category</h1>
<form method="post" action="{{url("category/$category->category_id")}}">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
  <div class="form-group">
        <label class="text-danger">Category_id : </label>
        <input type ="number" class="form-control" name="category_id" placeholder="Category_id" />
        Current Value : {{$category->category_id}}
    </div>

   <div class="form-group">
        <label class="text-danger">Name : </label>
        <input type ="text" class="form-control" name="name" placeholder="Name" />
        Current Value : {{$category->name}}
    </div>

   
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Update" />
    </div>
</form>

    @if(isset($category->film))
    <h3>Associate Film</h3>
<form action="" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <select class="form-control" name="film">
        @forelse(\App\Film::all() as  $film)
        <option value="{{$film->film_id}}">
                              {{$film->title}}
                             {{$film->description}}
                             {{$film->release_year}}
                              {{$film->rental_duration}}
                             {{$film->rental_rate}}
                             {{$film->length}}
                             {{$film->replacement_cost}}
                        </option>
        @empty
        <option value="-1">No film</option>
        @endforelse
    </select>

    <input type="submit"  class="btn btn-primary" value="Associate"/>
</form>    @else
    <label class="text-danger">No category.</label>
    @endif
@endsection