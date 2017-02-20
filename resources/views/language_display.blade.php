@extends('master')
@section('content')
<h1 class="text-danger">Display Language</h1>

    <a href="{{url("/language/$language->language_id")}}/edit">Edit</a></br>

    <br/>


       
        <div class="form-group">
            <label class="text-danger text-md">Name : </label>
             <input type ="text" class="form-control" name="name" value = "{{$language->name}}"placeholder="Name" readonly required />         </div>
       

            @if(isset($language->film))
        <label class="text-danger text-md">Add Films</label>
        <select id="film" name="film[]" multiple="multiple" size="10">
            @forelse(\App\Film::all()->sortBy('title') as  $film)
                <option value="{{$film->film_id}}" @foreach($language->film as  $filmtmp) @if($filmtmp->film_id == $film->film_id) selected = "selected" @endif @endforeach>
                    {{$film->title}}
                </option>
            @empty
                <option value="-1">No film</option>
            @endforelse
        </select><br/>
        <script> $('#film').bootstrapDualListbox(
            {
                nonSelectedListLabel: 'Non-selected Film',
                selectedListLabel: 'Selected Film',
                moveOnSelect: true,
                nonSelectedFilter: ''
            }
        ); </script>
        @else
                @endif
     

    
    @if(isset($language->film))
            @else
        <label class="text-danger text-md">No film related to this language.</label>
    @endif
     @endsection