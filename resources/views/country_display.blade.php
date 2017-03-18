@extends('master')
@section('content')
<h1 class="text-danger">Display Country</h1>

    <a href="{{url("/country/$country->country_id")}}/edit">Edit</a></br>

    <br/>


       
        <div class="form-group">
            <label class="text-danger text-md">Country : </label>
             <input type ="text" class="form-control" name="country" value = "{{$country->country}}"placeholder="Country" readonly required />         </div>
       

            @if(isset($country->city))
        <label class="text-danger text-md"> Cities</label>
        <select id="city" name="city[]"  multiple data-plugin-selectTwo class="form-control populate" disabled >
            @forelse(\App\City::all()->sortBy('city') as  $city)
                <option value="{{$city->city_id}}" @foreach($country->city as  $citytmp) @if($citytmp->city_id == $city->city_id) selected = "selected" @endif @endforeach>
                    {{$city->city}}
                </option>
            @empty
                <option value="-1">No city</option>
            @endforelse
        </select>

    
    <br/>
        @else
                @endif
            @if(isset($country->address))
        
        @else
                @endif
     

    
    @if(isset($country->city))
            @else
        <label class="text-danger text-md">No city related to this country.</label>
    @endif
    
    @if(isset($country->address))
            @else
        <label class="text-danger text-md">No address related to this country.</label>
    @endif
     @endsection