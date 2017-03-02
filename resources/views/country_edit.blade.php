@extends('master')
@section('content')
<h1 class="text-danger">Edit Country</h1>
    <form method="post" action="{{url("country/$country->country_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
           
        <div class="form-group">
            <label class="text-danger text-md">Country : </label>
             <input type ="text" class="form-control" name="country" value = "{{$country->country}}"placeholder="Country"  required />         </div>
           
             @if(isset($country->address))
        
    @else
            @endif
      
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection