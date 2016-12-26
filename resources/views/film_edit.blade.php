@extends('master')
@section('content')
<h1 class="text-danger">Edit Film</h1>
    <form method="post" action="{{url("film/$film->film_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
             
        <div class="form-group">
            <label class="text-danger">Title : </label>
            <input type ="text" class="form-control" name="title" value = "{{$film->title}}"placeholder="Title"  required />
        </div>
          
        <div class="form-group">
            <label class="text-danger">Description : </label>
            <textarea name="description" rows="4" cols="20" class="form-control" required>{{$film->description}}</textarea>
        </div>
          
        <div class="form-group">
            <label class="text-danger">Release year : </label>
            <input type ="number" class="form-control" name="release_year"  data-plugin-maxlength="" maxlength="10"value = "{{$film->release_year}}"placeholder="Release year"  required />
        </div>
            
        <div class="form-group">
            <label class="text-danger">Rental duration : </label>
            <input type ="number" class="form-control" name="rental_duration"  data-plugin-maxlength="" maxlength="10"value = "{{$film->rental_duration}}"placeholder="Rental duration"  required />
        </div>
          
        <div class="form-group">
            <label class="text-danger">Rental rate : </label>
            <input type ="number" class="form-control" name="rental_rate"  data-plugin-maxlength="" maxlength="10"value = "{{$film->rental_rate}}"placeholder="Rental rate"  required />
        </div>
          
        <div class="form-group">
            <label class="text-danger">Length : </label>
            <input type ="number" class="form-control" name="length"  data-plugin-maxlength="" maxlength="10"value = "{{$film->length}}"placeholder="Length"  required />
        </div>
          
        <div class="form-group">
            <label class="text-danger">Replacement cost : </label>
            <input type ="number" class="form-control" name="replacement_cost"  data-plugin-maxlength="" maxlength="10"value = "{{$film->replacement_cost}}"placeholder="Replacement cost"  required />
        </div>
               
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>

        @if(isset($film->language))
        <h3>Update Language</h3>
<form action="{{url("/film/updateLanguage/$film->film_id")}}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <select class="form-control" name="language">
        @forelse(\App\Language::all() as  $language)
        <option value="{{$language->language_id}}" @if($language->language_id == $film->language->language_id) selected = "selected" @endif>
            {{$language->name}}
        </option>
        @empty
        <option value="-1">No language</option>
        @endforelse
    </select><br/>

    <input type="submit"  class="btn btn-primary" value="Update"/>
</form>
    @else
                    <h3>Update Language</h3>
    <form action="{{url("/film/updateLanguage/$film->film_id")}}" method="post">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <select class="form-control" name="language">
            @forelse(\App\Language::all() as  $language)
                <option value="{{$language->language_id}}">
                    {{$language->name}}
                </option>
            @empty
                <option value="-1">No language</option>
            @endforelse
        </select><br/>

        <input type="submit"  class="btn btn-primary" value="Update"/>
    </form>            @endif
        @if(isset($film->category))
        <h3 class="text-danger">Associate Category</h3>
    <form action="{{url("/film/addCategory/$film->film_id")}}" method="post">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one category"  name="category[]">
            @forelse(\App\Category::all() as  $category)
                <option value="{{$category->category_id}}" @foreach($film->category as  $categorytmp) @if($categorytmp->category_id == $category->category_id) selected = "selected" @endif @endforeach>
                    {{$category->name}}
                </option>
            @empty
                <option value="-1">No category</option>
            @endforelse

        </select><br/>

        <input type="submit"  class="btn btn-primary" value="Associate"/>

    </form>
    @else
                    <h3 class="text-danger">Associate Category</h3>
    <form action="{{url("/film/addCategory/$film->film_id")}}" method="post">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one category"  name="category[]">
            @forelse(\App\Category::all() as  $category)
                <option value="{{$category->category_id}}">
                    {{$category->name}}
                </option>
            @empty
                <option value="-1">No category</option>
            @endforelse
        </select><br/>

        <input type="submit"  class="btn btn-primary" value="Associate"/>
    s</form>            @endif
    @endsection