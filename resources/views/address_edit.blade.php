@extends('master')
@section('content')
<h1 class="text-danger">Edit Address</h1>
    <form method="post" action="{{url("address/$address->address_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
           
        <div class="form-group">
            <label class="text-danger text-md">Address : </label>
             <input type ="text" class="form-control" name="address" value = "{{$address->address}}"placeholder="Address"  required />         </div>
          
        <div class="form-group">
            <label class="text-danger text-md">Address2 : </label>
             <input type ="text" class="form-control" name="address2" value = "{{$address->address2}}"placeholder="Address2"  required />         </div>
          
        <div class="form-group">
            <label class="text-danger text-md">District : </label>
             <input type ="text" class="form-control" name="district" value = "{{$address->district}}"placeholder="District"  required />         </div>
            
        <div class="form-group">
            <label class="text-danger text-md">Postal code : </label>
             <input type ="text" class="form-control" name="postal_code" value = "{{$address->postal_code}}"placeholder="Postal code"  required />         </div>
          
        <div class="form-group">
            <label class="text-danger text-md">Phone : </label>
             <input type ="text" class="form-control" name="phone" value = "{{$address->phone}}"placeholder="Phone"  required />         </div>
           
               @if(isset($address->city))
        <label class="text-danger text-md"> Update City</label>
    <select class="form-control" name="city" >
        @forelse(\App\City::all() as  $city)
        <option value="{{$city->city_id}}" @if($city->city_id == $address->city->city_id) selected = "selected" @endif>
            {{$city->city}}
        </option>
        @empty
        <option value="-1">No city</option>
        @endforelse
    </select><br/>
    @else
                    <label class="text-danger text-md">Update City</label>
        <select class="form-control" name="city">
            @forelse(\App\City::all() as  $city)
                <option value="{{$city->city_id}}">
                    {{$city->city}}
                </option>
            @empty
                <option value="-1">No city</option>
            @endforelse
        </select><br/>            @endif
      
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection