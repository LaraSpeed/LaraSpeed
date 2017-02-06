@extends('master')
@section('content')
<h1 class="text-danger">Edit Director</h1>
    <form method="post" action="{{url("director/$director->id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
           
        <div class="form-group">
            <label class="text-danger">Name : </label>
            <input type ="text" class="form-control" name="name" value = "{{$director->name}}"placeholder="Name"  required />
        </div>
          
        <div class="form-group">
            <label class="text-danger">Birth : </label>
            <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" id="date" data-plugin-datepicker="" name="birth" value="{{$director->birth}}" placeholder="MM/DD/-YYYY" type="text"/></div>
        </div>
          
        <div class="form-group">
            <label class="text-danger">Bio : </label>
            <textarea name="bio" rows="4" cols="20" class="form-control" required>{{$director->bio}}</textarea>
        </div>
         
            @if(isset($director->film))
        <h3 class="text-danger">Add Film</h3>
        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one film"  name="film[]">
            @forelse(\App\Film::all() as  $film)
                <option value="{{$film->id}}" @foreach($director->film as  $filmtmp) @if($filmtmp->id == $film->id) selected = "selected" @endif @endforeach>
                    {{$film->title}}
                </option>
            @empty
                <option value="-1">No film</option>
            @endforelse
        </select><br/>
    @else
            @endif
     
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection