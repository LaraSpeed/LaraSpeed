@extends('master')
@section('content')
<h1 class="text-danger">Display City</h1>

    <a href="{{url("/city/$city->city_id")}}/edit">Edit</a></br>

    <br/>


       
        <div class="form-group">
            <label class="text-danger text-md">City : </label>
             <input type ="text" class="form-control" name="city" value = "{{$city->city}}"placeholder="City" readonly required />         </div>
         

            @if(isset($city->address))
        <label class="text-danger text-md">Add Addresses</label>
        <select id="address" name="address[]" multiple="multiple" size="10">
            @forelse(\App\Address::all()->sortBy('address') as  $address)
                <option value="{{$address->address_id}}" @foreach($city->address as  $addresstmp) @if($addresstmp->address_id == $address->address_id) selected = "selected" @endif @endforeach>
                    {{$address->address}}
                </option>
            @empty
                <option value="-1">No address</option>
            @endforelse
        </select><br/>
        <script> $('#address').bootstrapDualListbox(
            {
                nonSelectedListLabel: 'Non-selected Address',
                selectedListLabel: 'Selected Address',
                moveOnSelect: true,
                nonSelectedFilter: ''
            }
        ); </script>
        @else
                @endif
            @if(isset($city->country))
        <label class="text-danger text-md">Update Country</label>
    <select class="form-control" name="country"  disabled >
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
        </select><br/>                @endif
     

    
    @if(isset($city->address))
            @else
        <label class="text-danger text-md">No address related to this city.</label>
    @endif
    
    @if(isset($city->country))
            @else
        <label class="text-danger text-md">No country related to this city.</label>
    @endif
     @endsection