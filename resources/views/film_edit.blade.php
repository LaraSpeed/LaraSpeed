@extends('master')
@section('content')
<h1 class="text-danger">Edit Film</h1>
    <form method="post" action="{{url("film/$film->id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
           
        <div class="form-group">
            <label class="text-danger">Title : </label>
            <input type ="text" class="form-control" name="title" value = "{{$film->title}}"placeholder="Title"  required />
        </div>
          
        <div class="form-group">
            <label class="text-danger">Description : </label>
            <textarea name="description" rows="10" cols="40" class="form-control" required>{{$film->description}}</textarea>
        </div>
          
        <div class="form-group">
            <label class="text-danger">Price : </label>
            <input type ="number" class="form-control" name="price"  data-plugin-maxlength="" maxlength="10"value = "{{$film->price}}"placeholder="Price"  required />
        </div>
          
        <div class="form-group">
            <label class="text-danger">Famous : </label>
            <input type ="checkbox" class="form-control" name="famous"  checked  required />
        </div>
         
            @if(isset($film->director))
        <h3>Update Director</h3>
    <select class="form-control" name="director">
        @forelse(\App\Director::all() as  $director)
        <option value="{{$director->id}}" @if($director->id == $film->director->id) selected = "selected" @endif>
            {{$director->name}}
        </option>
        @empty
        <option value="-1">No director</option>
        @endforelse
    </select><br/>
    @else
                    <h3>Update Director</h3>
        <select class="form-control" name="director">
            @forelse(\App\Director::all() as  $director)
                <option value="{{$director->id}}">
                    {{$director->name}}
                </option>
            @empty
                <option value="-1">No director</option>
            @endforelse
        </select><br/>            @endif
     
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection