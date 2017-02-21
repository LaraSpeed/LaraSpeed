@extends('master')
@section('content')
<h1 class="text-danger">Edit Inventory</h1>
    <form method="post" action="{{url("inventory/$inventory->inventory_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                
            @if(isset($inventory->film))
        <label class="text-danger text-md">Update Film</label>
    <select class="form-control" name="film" >
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
        </select><br/>            @endif
        @if(isset($inventory->store))
        <label class="text-danger text-md">Update Store</label>
    <select class="form-control" name="store" >
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
        </select><br/>            @endif
     
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection