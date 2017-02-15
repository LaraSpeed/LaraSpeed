@extends('master')
@section('content')
<h1 class="text-danger">Display Film</h1>

    <a href="{{url("/film/$film->film_id")}}/edit">Edit</a></br>

    <br/>


         
        <div class="form-group">
            <label class="text-danger text-md">Title : </label>
            <input type ="text" class="form-control" name="title" value = "{{$film->title}}"placeholder="Title" readonly required />
        </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Description : </label>
            <textarea name="description" rows="4" cols="20" class="form-control"" readonly >{{$film->description}}</textarea>
        </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Release year : </label>
            <input type ="number" class="form-control" name="release_year"  data-plugin-maxlength="" maxlength="10"value = "{{$film->release_year}}"placeholder="Release year" readonly required />
        </div>
        
        <div class="form-group">
            <label class="text-danger text-md">Rental duration : </label>
            <input type ="number" class="form-control" name="rental_duration"  data-plugin-maxlength="" maxlength="10"value = "{{$film->rental_duration}}"placeholder="Rental duration" readonly required />
        </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Rental rate : </label>
            <input type ="number" class="form-control" name="rental_rate"  data-plugin-maxlength="" maxlength="10"value = "{{$film->rental_rate}}"placeholder="Rental rate" readonly required />
        </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Length : </label>
            <input type ="number" class="form-control" name="length"  data-plugin-maxlength="" maxlength="10"value = "{{$film->length}}"placeholder="Length" readonly required />
        </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Replacement cost : </label>
            <input type ="number" class="form-control" name="replacement_cost"  data-plugin-maxlength="" maxlength="10"value = "{{$film->replacement_cost}}"placeholder="Replacement cost" readonly required />
        </div>
           

            @if(isset($film->language))
        <label class="text-danger text-md">Update Language</label>
    <select class="form-control" name="language"  disabled >
        @forelse(\App\Language::all() as  $language)
        <option value="{{$language->language_id}}" @if($language->language_id == $film->language->language_id) selected = "selected" @endif>
            {{$language->name}}
        </option>
        @empty
        <option value="-1">No language</option>
        @endforelse
    </select><br/>
        @else
                    <label class="text-danger text-md">Update Language</label>
        <select class="form-control" name="language">
            @forelse(\App\Language::all() as  $language)
                <option value="{{$language->language_id}}">
                    {{$language->name}}
                </option>
            @empty
                <option value="-1">No language</option>
            @endforelse
        </select><br/>                @endif
            @if(isset($film->category))
        <label class="text-danger text-md">Associate Category</label>

        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one category"  name="category[]"  disabled >
            @forelse(\App\Category::all()->sortBy('name') as  $category)
                <option value="{{$category->category_id}}" @foreach($film->category as  $categorytmp) @if($categorytmp->category_id == $category->category_id) selected = "selected"  @endif @endforeach>
                    {{$category->name}}
                </option>
            @empty
                <option value="-1">No category</option>
            @endforelse

        </select><br/>
        @else
                    <label class="text-danger text-md">Associate Category</label>
        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one category"  name="category[]">
            @forelse(\App\Category::all()->sortBy('name') as  $category)
                <option value="{{$category->category_id}}">
                    {{$category->name}}
                </option>
            @empty
                <option value="-1">No category</option>
            @endforelse
        </select><br/>                @endif
            @if(isset($film->actor))
        <label class="text-danger text-md">Associate Actor</label>

        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one actor"  name="actor[]"  disabled >
            @forelse(\App\Actor::all()->sortBy('first_name') as  $actor)
                <option value="{{$actor->actor_id}}" @foreach($film->actor as  $actortmp) @if($actortmp->actor_id == $actor->actor_id) selected = "selected"  @endif @endforeach>
                    {{$actor->first_name}}
                </option>
            @empty
                <option value="-1">No actor</option>
            @endforelse

        </select><br/>
        @else
                    <label class="text-danger text-md">Associate Actor</label>
        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one actor"  name="actor[]">
            @forelse(\App\Actor::all()->sortBy('first_name') as  $actor)
                <option value="{{$actor->actor_id}}">
                    {{$actor->first_name}}
                </option>
            @empty
                <option value="-1">No actor</option>
            @endforelse
        </select><br/>                @endif
     

    
    @if(isset($film->language))
            @else
        <label class="text-danger text-md">No language related to this film.</label>
    @endif
    
    @if(isset($film->category))
            @else
        <label class="text-danger text-md">No category related to this film.</label>
    @endif
    
    @if(isset($film->actor))
            @else
        <label class="text-danger text-md">No actor related to this film.</label>
    @endif
     @endsection