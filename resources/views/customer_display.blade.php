@extends('master')
@section('content')
<h1 class="text-danger">Display Customer</h1>

    <a href="{{url("/customer/$customer->customer_id")}}/edit">Edit</a></br>

    <br/>


         
        <div class="form-group">
            <label class="text-danger text-md">First name : </label>
            <input type ="text" class="form-control" name="first_name" value = "{{$customer->first_name}}"placeholder="First name" readonly required />
        </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Last name : </label>
            <input type ="text" class="form-control" name="last_name" value = "{{$customer->last_name}}"placeholder="Last name" readonly required />
        </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Email : </label>
            <input type ="text" class="form-control" name="email" value = "{{$customer->email}}"placeholder="Email" readonly required />
        </div>
          
        <div class="form-group">
            <label class="text-danger text-md">Create date : </label>
            <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" id="date" data-plugin-datepicker="" name="create_date" value="{{$customer->create_date}}" placeholder="MM/DD/-YYYY" type="text"/></div>
        </div>
       

            @if(isset($customer->inventory))
        <label class="text-danger text-md">Associate Inventory</label>

        <select id="inventory" name="inventory[]"  multiple data-plugin-selectTwo class="form-control populate" disabled >
            @forelse(\App\Inventory::all()->sortBy('film_id') as  $inventory)
                <option value="{{$inventory->inventory_id}}" @foreach($customer->inventory as  $inventorytmp) @if($inventorytmp->inventory_id == $inventory->inventory_id) selected = "selected" @endif @endforeach>
                    {{$inventory->film_id}}
                </option>
            @empty
                <option value="-1">No inventory</option>
            @endforelse

        </select><br/>

    
        @else
                    <label class="text-danger text-md">Associate Inventorys</label>
        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one inventory"  name="inventory[]">
            @forelse(\App\Inventory::all()->sortBy('film_id') as  $inventory)
                <option value="{{$inventory->inventory_id}}">
                    {{$inventory->film_id}}
                </option>
            @empty
                <option value="-1">No inventory</option>
            @endforelse
        </select><br/>                @endif
            @if(isset($customer->payment))
        <label class="text-danger text-md">Add Payments</label>
        <select id="payment" name="payment[]" multiple="multiple" size="10">
            @forelse(\App\Payment::all()->sortBy('amount') as  $payment)
                <option value="{{$payment->payment_id}}" @foreach($customer->payment as  $paymenttmp) @if($paymenttmp->payment_id == $payment->payment_id) selected = "selected" @endif @endforeach>
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
            @if(isset($customer->address))
        <label class="text-danger text-md">Update Address</label>
    <select class="form-control" name="address"  disabled >
        @forelse(\App\Address::all() as  $address)
        <option value="{{$address->address_id}}" @if($address->address_id == $customer->address->address_id) selected = "selected" @endif>
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
        </select><br/>                @endif
     

    
    @if(isset($customer->inventory))
            @else
        <label class="text-danger text-md">No inventory related to this customer.</label>
    @endif
    
    @if(isset($customer->payment))
            @else
        <label class="text-danger text-md">No payment related to this customer.</label>
    @endif
    
    @if(isset($customer->address))
            @else
        <label class="text-danger text-md">No address related to this customer.</label>
    @endif
     @endsection