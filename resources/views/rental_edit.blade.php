@extends('master')
@section('content')
<h1 class="text-danger">Edit Rental</h1>
    <form method="post" action="{{url("rental/$rental->rental_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
           
        <div class="form-group">
            <label class="text-danger text-md">Rental date : </label>
             <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" id="date" data-plugin-datepicker="" name="rental_date" value="{{$rental->rental_date}}" placeholder="MM/DD/-YYYY" type="text"/></div>         </div>
              
        <div class="form-group">
            <label class="text-danger text-md">Return date : </label>
             <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" id="date" data-plugin-datepicker="" name="return_date" value="{{$rental->return_date}}" placeholder="MM/DD/-YYYY" type="text"/></div>         </div>
             
            @if(isset($rental->payment))
        <label class="text-danger text-md">Add Payments</label>
        <select id="payment" name="payment[]" multiple="multiple" size="10">
            @forelse(\App\Payment::all()->sortBy('amount') as  $payment)
                <option value="{{$payment->payment_id}}" @foreach($rental->payment as  $paymenttmp) @if($paymenttmp->payment_id == $payment->payment_id) selected = "selected" @endif @endforeach>
                    {{$payment->amount}}
                </option>
            @empty
                <option value="-1">No payment</option>
            @endforelse
        </select><br/>
        <script> $('#payment').bootstrapDualListbox(
            {
                nonSelectedListLabel: 'Non-selected Payment',
                selectedListLabel: 'Selected Payment',
                moveOnSelect: true,
                nonSelectedFilter: ''
            }
        ); </script>
    @else
            @endif
        @if(isset($rental->staff))
        <label class="text-danger text-md">Update Staff</label>
    <select class="form-control" name="staff" >
        @forelse(\App\Staff::all() as  $staff)
        <option value="{{$staff->staff_id}}" @if($staff->staff_id == $rental->staff->staff_id) selected = "selected" @endif>
            {{$staff->first_name}}
        </option>
        @empty
        <option value="-1">No staff</option>
        @endforelse
    </select><br/>
    @else
                    <label class="text-danger text-md">Update Staff</label>
        <select class="form-control" name="staff">
            @forelse(\App\Staff::all() as  $staff)
                <option value="{{$staff->staff_id}}">
                    {{$staff->first_name}}
                </option>
            @empty
                <option value="-1">No staff</option>
            @endforelse
        </select><br/>            @endif
        @if(isset($rental->customer))
        <label class="text-danger text-md">Update Customer</label>
    <select class="form-control" name="customer" >
        @forelse(\App\Customer::all() as  $customer)
        <option value="{{$customer->customer_id}}" @if($customer->customer_id == $rental->customer->customer_id) selected = "selected" @endif>
            {{$customer->first_name}}
        </option>
        @empty
        <option value="-1">No customer</option>
        @endforelse
    </select><br/>
    @else
                    <label class="text-danger text-md">Update Customer</label>
        <select class="form-control" name="customer">
            @forelse(\App\Customer::all() as  $customer)
                <option value="{{$customer->customer_id}}">
                    {{$customer->first_name}}
                </option>
            @empty
                <option value="-1">No customer</option>
            @endforelse
        </select><br/>            @endif
        @if(isset($rental->inventory))
        <label class="text-danger text-md">Update Inventory</label>
    <select class="form-control" name="inventory" >
        @forelse(\App\Inventory::all() as  $inventory)
        <option value="{{$inventory->inventory_id}}" @if($inventory->inventory_id == $rental->inventory->inventory_id) selected = "selected" @endif>
            {{$inventory->store->address->address}}
        </option>
        @empty
        <option value="-1">No inventory</option>
        @endforelse
    </select><br/>
    @else
                    <label class="text-danger text-md">Update Inventory</label>
        <select class="form-control" name="inventory">
            @forelse(\App\Inventory::all() as  $inventory)
                <option value="{{$inventory->inventory_id}}">
                    {{$inventory->store->address->address}}
                </option>
            @empty
                <option value="-1">No inventory</option>
            @endforelse
        </select><br/>            @endif
     
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection