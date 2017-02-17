@extends('master')
@section('content')
<h1 class="text-danger">Edit Store</h1>
    <form method="post" action="{{url("store/$store->store_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              
        
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection