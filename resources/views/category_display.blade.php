@extends('master')
@section('content')
<h1 class="text-danger">Display Category</h1>

    <a href="{{url("/category/$category->category_id")}}/edit">Edit</a></br>

    <br/>


       
        <div class="form-group">
            <label class="text-danger text-md">Name : </label>
             <input type ="text" class="form-control" name="name" value = "{{$category->name}}"placeholder="Name" readonly required />         </div>
       

            @if(isset($category->film))
        <label class="text-danger text-md">Associate Films</label>

        <select id="film" name="film[]"  multiple data-plugin-selectTwo class="form-control populate" disabled >
            @forelse(\App\Film::all()->sortBy('title') as  $film)                 <option value="{{$film->film_id}}" @foreach($category->film as  $filmtmp) @if($filmtmp->film_id == $film->film_id) selected = "selected" @endif @endforeach>
                    {{$film->title}}
                </option>
            @empty
                <option value="-1">No film</option>
            @endforelse

        </select>

                <br/>


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
     

    
    @if(isset($category->film))
            @else
        <label class="text-danger text-md">No film related to this category.</label>
    @endif
     @endsection