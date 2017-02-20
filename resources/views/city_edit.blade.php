@extends('master')
@section('content')
<h1 class="text-danger">Edit City</h1>
    <form method="post" action="{{url("city/$city->city_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
           
        <div class="form-group">
            <label class="text-danger text-md">City : </label>
            <input type ="text" class="form-control" name="city" value = "{{$city->city}}"placeholder="City"  required />
        </div>
             
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