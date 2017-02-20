@extends('master')
@section('content')
<h1 class="text-danger">Display Actor</h1>

    <a href="{{url("/actor/$actor->actor_id")}}/edit">Edit</a></br>

    <br/>


       
        <div class="form-group">
            <label class="text-danger text-md">First name : </label>
             <input type ="text" class="form-control" name="first_name" value = "{{$actor->first_name}}"placeholder="First name" readonly required />         </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Last name : </label>
             <input type ="text" class="form-control" name="last_name" value = "{{$actor->last_name}}"placeholder="Last name" readonly required />         </div>
       

            @if(isset($actor->film))
        <label class="text-danger text-md">Associate Films</label>

        <select id="film" name="film[]"  multiple data-plugin-selectTwo class="form-control populate" disabled >
            @forelse(\App\Film::all()->sortBy('title') as  $film)
                <option value="{{$film->film_id}}" @foreach($actor->film as  $filmtmp) @if($filmtmp->film_id == $film->film_id) selected = "selected" @endif @endforeach>
                    {{$film->title}}
                </option>
            @empty
                <option value="-1">No film</option>
            @endforelse

        </select><br/>

    
        @else
                    <label class="text-danger text-md">Associate Films</label>
        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one film"  name="film[]">
            @forelse(\App\Film::all()->sortBy('title') as  $film)
                <option value="{{$film->film_id}}">
                    {{$film->title}}
                </option>
            @empty
                <option value="-1">No film</option>
            @endforelse
        </select><br/>                @endif
     

    
    @if(isset($actor->film))
            @else
        <label class="text-danger text-md">No film related to this actor.</label>
    @endif
     @endsection