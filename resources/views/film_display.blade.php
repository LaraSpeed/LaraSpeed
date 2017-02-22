@extends('master')
@section('content')
<h1 class="text-danger">Display Film</h1>

    <a href="{{url("/film/$film->film_id")}}/edit">Edit</a></br>

    <br/>


         
        <div class="form-group">
            <label class="text-danger text-md">Title : </label>
             <input type ="text" class="form-control" name="title" value = "{{$film->title}}"placeholder="Title" readonly required />         </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Description : </label>
             <textarea name="description" rows="4" cols="20" class="form-control"" readonly >{{$film->description}}</textarea>         </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Release year : </label>
             <input type ="number" class="form-control" name="release_year"  data-plugin-maxlength="" maxlength="10"value = "{{$film->release_year}}"placeholder="Release year" readonly required />         </div>
        
        <div class="form-group">
            <label class="text-danger text-md">Rental duration : </label>
                            <div class="input-group mb-md">
                    <span class="input-group-addon">days</span>
                    <input type ="number" class="form-control" name="rental_duration"  data-plugin-maxlength="" maxlength="10"value = "{{$film->rental_duration}}"placeholder="Rental duration" readonly required />
                </div>
                    </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Rental rate : </label>
                            <div class="input-group mb-md">
                    <span class="input-group-addon">$</span>
                    <input type ="number" class="form-control" name="rental_rate"  data-plugin-maxlength="" maxlength="10"value = "{{$film->rental_rate}}"placeholder="Rental rate" readonly required />
                </div>
                    </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Length : </label>
                            <div class="input-group mb-md">
                    <span class="input-group-addon">minutes</span>
                    <input type ="number" class="form-control" name="length"  data-plugin-maxlength="" maxlength="10"value = "{{$film->length}}"placeholder="Length" readonly required />
                </div>
                    </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Replacement cost : </label>
                            <div class="input-group mb-md">
                    <span class="input-group-addon">$</span>
                    <input type ="number" class="form-control" name="replacement_cost"  data-plugin-maxlength="" maxlength="10"value = "{{$film->replacement_cost}}"placeholder="Replacement cost" readonly required />
                </div>
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
        <label class="text-danger text-md">Associate Categories</label>

        <select id="category" name="category[]"  multiple data-plugin-selectTwo class="form-control populate" disabled >
            @forelse(\App\Category::all()->sortBy('name') as  $category)
                <option value="{{$category->category_id}}" @foreach($film->category as  $categorytmp) @if($categorytmp->category_id == $category->category_id) selected = "selected" @endif @endforeach>
                    {{$category->name}}
                </option>
            @empty
                <option value="-1">No category</option>
            @endforelse

        </select><br/>

    
        @else
                    <label class="text-danger text-md">Associate Categories</label>
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
        <label class="text-danger text-md">Associate Actors</label>

        <select id="actor" name="actor[]"  multiple data-plugin-selectTwo class="form-control populate" disabled >
            @forelse(\App\Actor::all()->sortBy('first_name') as  $actor)
                <option value="{{$actor->actor_id}}" @foreach($film->actor as  $actortmp) @if($actortmp->actor_id == $actor->actor_id) selected = "selected" @endif @endforeach>
                    {{$actor->first_name}}
                </option>
            @empty
                <option value="-1">No actor</option>
            @endforelse

        </select><br/>

    
        @else
                    <label class="text-danger text-md">Associate Actors</label>
        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one actor"  name="actor[]">
            @forelse(\App\Actor::all()->sortBy('first_name') as  $actor)
                <option value="{{$actor->actor_id}}">
                    {{$actor->first_name}}
                </option>
            @empty
                <option value="-1">No actor</option>
            @endforelse
        </select><br/>                @endif
            @if(isset($film->store))
        <label class="text-danger text-md">Associate Stores</label>

        <select id="store" name="store[]"  multiple data-plugin-selectTwo class="form-control populate" disabled >
            @forelse(\App\Store::all()->sortBy('address->address') as  $store)
                <option value="{{$store->store_id}}" @foreach($film->store as  $storetmp) @if($storetmp->store_id == $store->store_id) selected = "selected" @endif @endforeach>
                    {{$store->address->address}}
                </option>
            @empty
                <option value="-1">No store</option>
            @endforelse

        </select><br/>

    
        @else
                    <label class="text-danger text-md">Associate Stores</label>
        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one store"  name="store[]">
            @forelse(\App\Store::all()->sortBy('address->address') as  $store)
                <option value="{{$store->store_id}}">
                    {{$store->address->address}}
                </option>
            @empty
                <option value="-1">No store</option>
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
    
    @if(isset($film->store))
            @else
        <label class="text-danger text-md">No store related to this film.</label>
    @endif
     @endsection