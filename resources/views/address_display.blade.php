@extends('master')
@section('content')
<h1 class="text-danger">Display Address</h1>

    <a href="{{url("/address/$address->address_id")}}/edit">Edit</a></br>

    <br/>


       
        <div class="form-group">
            <label class="text-danger text-md">Address : </label>
             <input type ="text" class="form-control" name="address" value = "{{$address->address}}"placeholder="Address" readonly required />         </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Address2 : </label>
             <input type ="text" class="form-control" name="address2" value = "{{$address->address2}}"placeholder="Address2" readonly required />         </div>
      
        <div class="form-group">
            <label class="text-danger text-md">District : </label>
             <input type ="text" class="form-control" name="district" value = "{{$address->district}}"placeholder="District" readonly required />         </div>
        
        <div class="form-group">
            <label class="text-danger text-md">Postal code : </label>
             <input type ="text" class="form-control" name="postal_code" value = "{{$address->postal_code}}"placeholder="Postal code" readonly required />         </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Phone : </label>
             <input type ="text" class="form-control" name="phone" value = "{{$address->phone}}"placeholder="Phone" readonly required />         </div>
       

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
            @if(isset($address->city))
        <label class="text-danger text-md">Update City</label>
    <select class="form-control" name="city"  disabled >
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
        </select><br/>                @endif
     

    
    @if(isset($address->customer))
            @else
        <label class="text-danger text-md">No customer related to this address.</label>
    @endif
    
    @if(isset($address->staff))
            @else
        <label class="text-danger text-md">No staff related to this address.</label>
    @endif
    
    @if(isset($address->city))
            @else
        <label class="text-danger text-md">No city related to this address.</label>
    @endif
     @endsection