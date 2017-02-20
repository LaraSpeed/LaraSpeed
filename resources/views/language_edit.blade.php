@extends('master')
@section('content')
<h1 class="text-danger">Edit Language</h1>
    <form method="post" action="{{url("language/$language->language_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
           
        <div class="form-group">
            <label class="text-danger text-md">Name : </label>
             <input type ="text" class="form-control" name="name" value = "{{$language->name}}"placeholder="Name"  required />         </div>
           
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
     
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection