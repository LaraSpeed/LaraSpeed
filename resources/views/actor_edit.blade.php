@extends('master')
@section('content')
<h1 class="text-danger">Edit Actor</h1>
    <form method="post" action="{{url("actor/$actor->actor_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
           
        <div class="form-group">
            <label class="text-danger text-md">First name : </label>
            <input type ="text" class="form-control" name="first_name" value = "{{$actor->first_name}}"placeholder="First name"  required />
        </div>
          
        <div class="form-group">
            <label class="text-danger text-md">Last name : </label>
            <input type ="text" class="form-control" name="last_name" value = "{{$actor->last_name}}"placeholder="Last name"  required />
        </div>
           
            @if(isset($actor->film))
        <label class="text-danger text-md">Associate Films</label>

        <select id="film" name="film[]"  multiple="multiple" size="10" >
            @forelse(\App\Film::all()->sortBy('title') as  $film)
                <option value="{{$film->film_id}}" @foreach($actor->film as  $filmtmp) @if($filmtmp->film_id == $film->film_id) selected = "selected" @endif @endforeach>
                    {{$film->title}}
                </option>
            @empty
                <option value="-1">No film</option>
            @endforelse

        </select><br/>

            <script> $('#film').bootstrapDualListbox(
                {
                    nonSelectedListLabel: 'Non-selected film',
                    selectedListLabel: 'Selected film',
                    moveOnSelect: true,
                    nonSelectedFilter: ''
                }
        ); </script>
    
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
        </select><br/>            @endif
     
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection