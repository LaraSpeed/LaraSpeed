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
           
            @if(isset($address->customer))
        <label class="text-danger text-md">Add Customers</label>
        <select id="customer" name="customer[]" multiple="multiple" size="10">
            @forelse(\App\Customer::all()->sortBy('first_name') as  $customer)
                <option value="{{$customer->customer_id}}" @foreach($address->customer as  $customertmp) @if($customertmp->customer_id == $customer->customer_id) selected = "selected" @endif @endforeach>
                    {{$customer->first_name}}
                </option>
            @empty
                <option value="-1">No customer</option>
            @endforelse
        </select><br/>
        <script> $('#customer').bootstrapDualListbox(
            {
                nonSelectedListLabel: 'Non-selected Customer',
                selectedListLabel: 'Selected Customer',
                moveOnSelect: true,
                nonSelectedFilter: ''
            }
        ); </script>
    @else
            @endif
        @if(isset($address->staff))
        <label class="text-danger text-md">Add Staffs</label>
        <select id="staff" name="staff[]" multiple="multiple" size="10">
            @forelse(\App\Staff::all()->sortBy('first_name') as  $staff)
                <option value="{{$staff->staff_id}}" @foreach($address->staff as  $stafftmp) @if($stafftmp->staff_id == $staff->staff_id) selected = "selected" @endif @endforeach>
                    {{$staff->first_name}}
                </option>
            @empty
                <option value="-1">No staff</option>
            @endforelse
        </select><br/>
        <script> $('#staff').bootstrapDualListbox(
            {
                nonSelectedListLabel: 'Non-selected Staff',
                selectedListLabel: 'Selected Staff',
                moveOnSelect: true,
                nonSelectedFilter: ''
            }
        ); </script>
    @else
            @endif
        @if(isset($address->store))
        <label class="text-danger text-md">Add Stores</label>
        <select id="store" name="store[]" multiple="multiple" size="10">
            @forelse(\App\Store::all()->sortBy('address->address') as  $store)
                <option value="{{$store->store_id}}" @foreach($address->store as  $storetmp) @if($storetmp->store_id == $store->store_id) selected = "selected" @endif @endforeach>
                    {{$store->address->address}}
                </option>
            @empty
                <option value="-1">No store</option>
            @endforelse
        </select><br/>
        <script> $('#store').bootstrapDualListbox(
            {
                nonSelectedListLabel: 'Non-selected Store',
                selectedListLabel: 'Selected Store',
                moveOnSelect: true,
                nonSelectedFilter: ''
            }
        ); </script>
    @else
            @endif
        @if(isset($address->city))
        <label class="text-danger text-md">Update City</label>
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