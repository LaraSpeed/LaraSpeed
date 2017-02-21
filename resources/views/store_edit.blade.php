@extends('master')
@section('content')
<h1 class="text-danger">Edit Store</h1>
    <form method="post" action="{{url("store/$store->store_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              
            @if(isset($store->address))
        <label class="text-danger text-md">Update Address</label>
    <select class="form-control" name="address" >
        @forelse(\App\Address::all() as  $address)
        <option value="{{$address->address_id}}" @if($address->address_id == $store->address->address_id) selected = "selected" @endif>
            {{$address->address}}
        </option>
        @empty
        <option value="-1">No address</option>
        @endforelse
    </select><br/>
    @else
                    <label class="text-danger text-md">Update Address</label>
        <select class="form-control" name="address">
            @forelse(\App\Address::all() as  $address)
                <option value="{{$address->address_id}}">
                    {{$address->address}}
                </option>
            @empty
                <option value="-1">No address</option>
            @endforelse
        </select><br/>            @endif
        @if(isset($store->staff))
        <label class="text-danger text-md">Add Staffs</label>
        <select id="staff" name="staff[]" multiple="multiple" size="10">
            @forelse(\App\Staff::all()->sortBy('first_name') as  $staff)
                <option value="{{$staff->staff_id}}" @foreach($store->staff as  $stafftmp) @if($stafftmp->staff_id == $staff->staff_id) selected = "selected" @endif @endforeach>
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
        @if(isset($store->inventory))
        <label class="text-danger text-md">Add Inventories</label>
        <select id="inventory" name="inventory[]" multiple="multiple" size="10">
            @forelse(\App\Inventory::all()->sortBy('store->address->address') as  $inventory)
                <option value="{{$inventory->inventory_id}}" @foreach($store->inventory as  $inventorytmp) @if($inventorytmp->inventory_id == $inventory->inventory_id) selected = "selected" @endif @endforeach>
                    {{$inventory->store->address->address}}
                </option>
            @empty
                <option value="-1">No inventory</option>
            @endforelse
        </select><br/>
        <script> $('#inventory').bootstrapDualListbox(
            {
                nonSelectedListLabel: 'Non-selected Inventory',
                selectedListLabel: 'Selected Inventory',
                moveOnSelect: true,
                nonSelectedFilter: ''
            }
        ); </script>
    @else
            @endif
        @if(isset($store->customer))
        <label class="text-danger text-md">Add Customers</label>
        <select id="customer" name="customer[]" multiple="multiple" size="10">
            @forelse(\App\Customer::all()->sortBy('first_name') as  $customer)
                <option value="{{$customer->customer_id}}" @foreach($store->customer as  $customertmp) @if($customertmp->customer_id == $customer->customer_id) selected = "selected" @endif @endforeach>
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
     
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection