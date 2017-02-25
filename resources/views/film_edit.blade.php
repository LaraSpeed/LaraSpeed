@extends('master')
@section('content')
<h1 class="text-danger">Edit Film</h1>
    <form method="post" action="{{url("film/$film->film_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
             
        <div class="form-group">
            <label class="text-danger text-md">Title : </label>
             <input type ="text" class="form-control" name="title" value = "{{$film->title}}"placeholder="Title"  required />         </div>
          
        <div class="form-group">
            <label class="text-danger text-md">Description : </label>
             <textarea name="description" rows="4" cols="20" class="form-control"">{{$film->description}}</textarea>         </div>
          
        <div class="form-group">
            <label class="text-danger text-md">Release year : </label>
             <input type ="number" class="form-control" name="release_year"  data-plugin-maxlength="" maxlength="10"value = "{{$film->release_year}}"placeholder="Release year"  required />         </div>
            
        <div class="form-group">
            <label class="text-danger text-md">Rental duration : </label>
                            <div class="input-group mb-md">
                    <span class="input-group-addon">days</span>
                    <input type ="number" class="form-control" name="rental_duration"  data-plugin-maxlength="" maxlength="10"value = "{{$film->rental_duration}}"placeholder="Rental duration"  required />
                </div>
                    </div>
          
        <div class="form-group">
            <label class="text-danger text-md">Rental rate : </label>
                            <div class="input-group mb-md">
                    <span class="input-group-addon">$</span>
                    <input type ="number" class="form-control" name="rental_rate"  data-plugin-maxlength="" maxlength="10"value = "{{$film->rental_rate}}"placeholder="Rental rate"  required />
                </div>
                    </div>
          
        <div class="form-group">
            <label class="text-danger text-md">Length : </label>
                            <div class="input-group mb-md">
                    <span class="input-group-addon">minutes</span>
                    <input type ="number" class="form-control" name="length"  data-plugin-maxlength="" maxlength="10"value = "{{$film->length}}"placeholder="Length"  required />
                </div>
                    </div>
          
        <div class="form-group">
            <label class="text-danger text-md">Replacement cost : </label>
                            <div class="input-group mb-md">
                    <span class="input-group-addon">$</span>
                    <input type ="number" class="form-control" name="replacement_cost"  data-plugin-maxlength="" maxlength="10"value = "{{$film->replacement_cost}}"placeholder="Replacement cost"  required />
                </div>
                    </div>
               
            @if(isset($film->language))
        <label class="text-danger text-md">Update Language</label>
    <select class="form-control" name="language" >
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
        </select><br/>            @endif
        @if(isset($film->category))
        <label class="text-danger text-md">Associate Categories</label>

        <select id="category" name="category[]"  multiple="multiple" size="10" >
             @forelse(\App\Category::paginate(5000)->sortBy('name') as  $category)                 <option value="{{$category->category_id}}" @foreach($film->category as  $categorytmp) @if($categorytmp->category_id == $category->category_id) selected = "selected" @endif @endforeach>
                    {{$category->name}}
                </option>
            @empty
                <option value="-1">No category</option>
            @endforelse

        </select>

                    {!!\App\Category::paginate(5000)->links()!!}
            <script> $('#category').bootstrapDualListbox(
                {
                    nonSelectedListLabel: 'Non-selected category',
                    selectedListLabel: 'Selected category',
                    moveOnSelect: true,
                    nonSelectedFilter: ''
                }
            ); </script>
                <br/>


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
        </select><br/>            @endif
        @if(isset($film->actor))
        <label class="text-danger text-md">Associate Actors</label>

        <select id="actor" name="actor[]"  multiple="multiple" size="10" >
             @forelse(\App\Actor::paginate(5000)->sortBy('first_name') as  $actor)                 <option value="{{$actor->actor_id}}" @foreach($film->actor as  $actortmp) @if($actortmp->actor_id == $actor->actor_id) selected = "selected" @endif @endforeach>
                    {{$actor->first_name}}
                </option>
            @empty
                <option value="-1">No actor</option>
            @endforelse

        </select>

                    {!!\App\Actor::paginate(5000)->links()!!}
            <script> $('#actor').bootstrapDualListbox(
                {
                    nonSelectedListLabel: 'Non-selected actor',
                    selectedListLabel: 'Selected actor',
                    moveOnSelect: true,
                    nonSelectedFilter: ''
                }
            ); </script>
                <br/>


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
        </select><br/>            @endif
        @if(isset($film->store))
        <label class="text-danger text-md">Associate Stores</label>

        <select id="store" name="store[]"  multiple="multiple" size="10" >
             @forelse(\App\Store::paginate(5000)->sortBy('address->address') as  $store)                 <option value="{{$store->store_id}}" @foreach($film->store as  $storetmp) @if($storetmp->store_id == $store->store_id) selected = "selected" @endif @endforeach>
                    {{$store->address->address}}
                </option>
            @empty
                <option value="-1">No store</option>
            @endforelse

        </select>

                    {!!\App\Store::paginate(5000)->links()!!}
            <script> $('#store').bootstrapDualListbox(
                {
                    nonSelectedListLabel: 'Non-selected store',
                    selectedListLabel: 'Selected store',
                    moveOnSelect: true,
                    nonSelectedFilter: ''
                }
            ); </script>
                <br/>


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
        </select><br/>            @endif
     
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection