@extends('master')
@section('content')
<h1 class="text-danger">Edit Language</h1>
<form method="post" action="{{url("language/$language->language_id")}}">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="form-group">
        <label class="text-danger">Name : </label>
        <input type ="text" class="form-control" name="name" value = "{{$language->name}}"placeholder="Name"  required />
    </div>

   
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Update" />
    </div>
</form>

    @if(isset($language->film))
    <h3>Add Film</h3>
<form action="{{url("/language/addFilm/$language->language_id")}}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <select class="form-control" name="film">
        @forelse(\App\Film::all() as  $film)
        <option value="{{$film->film_id}}">
            {{$film->title}}
        </option>
        @empty
        <option value="-1">No film</option>
        @endforelse
    </select>

    <input type="submit"  class="btn btn-primary" value="Add"/>
</form>
    @else
            @endif
@endsection