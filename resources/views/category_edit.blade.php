@extends('master')
@section('content')
<h1 class="text-danger">Edit Category</h1>
    <form method="post" action="{{url("category/$category->category_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
           
        <div class="form-group">
            <label class="text-danger">Name : </label>
            <input type ="text" class="form-control" name="name" value = "{{$category->name}}"placeholder="Name"  required />
        </div>
           
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>

        @if(isset($category->film))
        <h3 class="text-danger">Associate Film</h3>
    <form action="{{url("/category/addFilm/$category->category_id")}}" method="post">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one film"  name="film[]">
            @forelse(\App\Film::all() as  $film)
                <option value="{{$film->film_id}}" @foreach($category->film as  $filmtmp) @if($filmtmp->film_id == $film->film_id) selected = "selected" @endif @endforeach>
                    {{$film->title}}
                </option>
            @empty
                <option value="-1">No film</option>
            @endforelse

        </select><br/>

        <input type="submit"  class="btn btn-primary" value="Associate"/>

    </form>
    @else
                    <h3 class="text-danger">Associate Film</h3>
    <form action="{{url("/category/addFilm/$category->category_id")}}" method="post">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one film"  name="film[]">
            @forelse(\App\Film::all() as  $film)
                <option value="{{$film->film_id}}">
                    {{$film->title}}
                </option>
            @empty
                <option value="-1">No film</option>
            @endforelse
        </select><br/>

        <input type="submit"  class="btn btn-primary" value="Associate"/>
    s</form>            @endif
    @endsection