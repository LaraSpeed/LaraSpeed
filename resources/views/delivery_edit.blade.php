@extends('master')
@section('content')
<h1 class="text-danger">Edit Delivery</h1>
<form method="post" action="{{url("delivery/$delivery->id")}}">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="form-group">
        <label class="text-danger">Identifiant : </label>
        <input type ="text" class="form-control" name="identifiant" value = "{{$delivery->identifiant}}"placeholder="Identifiant"  required />
    </div>

   <div class="form-group">
        <label class="text-danger">Date : </label>
        <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" id="date" data-plugin-datepicker="" name="date" placeholder="MM/DD/-YYYY" type="text"/></div>
    </div>

   <div class="form-group">
        <label class="text-danger">Articles : </label>
        <textarea name="articles" rows="10" cols="40" class="form-control" required>{{$delivery->articles}}</textarea>
    </div>

 
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Update" />
    </div>
</form>

    @if(isset($delivery->film))
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
</form>
    @else
        @endif
@endsection