@extends('master')
@section('content')
<h1 class="text-danger">Edit City</h1>
    <form method="post" action="{{url("city/$city->city_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
           
        <div class="form-group">
            <label class="text-danger text-md">City : </label>
             <input type ="text" class="form-control" name="city" value = "{{$city->city}}"placeholder="City"  required />         </div>
             
             @if(isset($city->country))
        <label class="text-danger text-md"> Update Country</label>
    <select class="form-control" name="country" >
        @forelse(\App\Country::all() as  $country)
        <option value="{{$country->country_id}}" @if($country->country_id == $city->country->country_id) selected = "selected" @endif>
            {{$country->country}}
        </option>
        @empty
        <option value="-1">No country</option>
        @endforelse
    </select><br/>
    @else
                    <label class="text-danger text-md">Update Country</label>
        <select class="form-control" name="country">
            @forelse(\App\Country::all() as  $country)
                <option value="{{$country->country_id}}">
                    {{$country->country}}
                </option>
            @empty
                <option value="-1">No country</option>
            @endforelse
        </select><br/>            @endif
      
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection