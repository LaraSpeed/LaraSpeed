@extends('master')
@section('content')
<h1 class="text-danger">Edit Delivery</h1>
<form method="post" action="{{url("delivery/$delivery->id")}}">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="form-group">
        <label class="text-danger">Identifiant : </label>
        <input type ="text" class="form-control" name="identifiant" placeholder="Identifiant"  required />
        Current Value : {{$delivery->identifiant}}
    </div>

   <div class="form-group">
        <label class="text-danger">Date : </label>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
        Current Value : {{$delivery->date}}
    </div>

   <div class="form-group">
        <label class="text-danger">Articles : </label>
        <textarea name="articles" rows="10" cols="40" class="form-control" required></textarea>
        Current Value : {{$delivery->articles}}
    </div>

 
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Update" />
    </div>
</form>

    <h3>Update Film</h3>
<form action="{{url("/delivery/updateFilm/$delivery->id")}}" method="post">
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

    <input type="submit"  class="btn btn-primary" value="Update"/>
</form>@endsection