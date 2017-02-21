@extends('master')
@section('content')
<h1 class="text-danger">Display Inventory</h1>

    <a href="{{url("/inventory/$inventory->inventory_id")}}/edit">Edit</a></br>

    <br/>


            

            @if(isset($inventory->film))
        <label class="text-danger text-md">Update Film</label>
    <select class="form-control" name="film"  disabled >
        @forelse(\App\Film::all() as  $film)
        <option value="{{$film->film_id}}" @if($film->film_id == $inventory->film->film_id) selected = "selected" @endif>
            {{$film->title}}
        </option>
        @empty
        <option value="-1">No film</option>
        @endforelse
    </select><br/>
        @else
                    <label class="text-danger text-md">Update Film</label>
        <select class="form-control" name="film">
            @forelse(\App\Film::all() as  $film)
                <option value="{{$film->film_id}}">
                    {{$film->title}}
                </option>
            @empty
                <option value="-1">No film</option>
            @endforelse
        </select><br/>                @endif
            @if(isset($inventory->store))
        <label class="text-danger text-md">Update Store</label>
    <select class="form-control" name="store"  disabled >
        @forelse(\App\Store::all() as  $store)
        <option value="{{$store->store_id}}" @if($store->store_id == $inventory->store->store_id) selected = "selected" @endif>
            {{$store->address->address}}
        </option>
        @empty
        <option value="-1">No store</option>
        @endforelse
    </select><br/>
        @else
                    <label class="text-danger text-md">Update Store</label>
        <select class="form-control" name="store">
            @forelse(\App\Store::all() as  $store)
                <option value="{{$store->store_id}}">
                    {{$store->address->address}}
                </option>
            @empty
                <option value="-1">No store</option>
            @endforelse
        </select><br/>                @endif
     

    
    @if(isset($inventory->film))
            @else
        <label class="text-danger text-md">No film related to this inventory.</label>
    @endif
    
    @if(isset($inventory->store))
            @else
        <label class="text-danger text-md">No store related to this inventory.</label>
    @endif
     @endsection