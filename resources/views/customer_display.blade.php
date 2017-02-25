@extends('master')
@section('content')
<h1 class="text-danger">Display Customer</h1>

    <a href="{{url("/customer/$customer->customer_id")}}/edit">Edit</a></br>

    <br/>


         
        <div class="form-group">
            <label class="text-danger text-md">First name : </label>
             <input type ="text" class="form-control" name="first_name" value = "{{$customer->first_name}}"placeholder="First name" readonly required />         </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Last name : </label>
             <input type ="text" class="form-control" name="last_name" value = "{{$customer->last_name}}"placeholder="Last name" readonly required />         </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Email : </label>
             <input type ="text" class="form-control" name="email" value = "{{$customer->email}}"placeholder="Email" readonly required />         </div>
        
        <div class="form-group">
            <label class="text-danger text-md">Active : </label>
             <input type ="checkbox" class="form-control" name="active"  checked  required />         </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Create date : </label>
             <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" id="date" data-plugin-datepicker="" name="create_date" value="{{$customer->create_date}}" placeholder="MM/DD/-YYYY" type="text"/></div>         </div>
       

            @if(isset($customer->payment))
        <label class="text-danger text-md">Add Payments</label>
        <select id="payment" name="payment[]" multiple="multiple" size="10">
            @forelse(\App\Payment::paginate(5000)->sortBy('payment_date') as  $payment)
                <option value="{{$payment->payment_id}}" @foreach($customer->payment as  $paymenttmp) @if($paymenttmp->payment_id == $payment->payment_id) selected = "selected" @endif @endforeach>
                    {{$payment->payment_date}}
                </option>
            @empty
                <option value="-1">No payment</option>
            @endforelse
        </select>
        {!!\App\Payment::paginate(5000)->links()!!}
        <script> $('#payment').bootstrapDualListbox(
            {
                nonSelectedListLabel: 'Non-selected Payment',
                selectedListLabel: 'Selected Payment',
                moveOnSelect: true,
                nonSelectedFilter: ''
            }
        ); </script>
        <br/>
        @else
                @endif
            @if(isset($customer->rental))
        <label class="text-danger text-md">Add Rentals</label>
        <select id="rental" name="rental[]" multiple="multiple" size="10">
            @forelse(\App\Rental::paginate(5000)->sortBy('rental_date') as  $rental)
                <option value="{{$rental->rental_id}}" @foreach($customer->rental as  $rentaltmp) @if($rentaltmp->rental_id == $rental->rental_id) selected = "selected" @endif @endforeach>
                    {{$rental->rental_date}}
                </option>
            @empty
                <option value="-1">No rental</option>
            @endforelse
        </select>
        {!!\App\Rental::paginate(5000)->links()!!}
        <script> $('#rental').bootstrapDualListbox(
            {
                nonSelectedListLabel: 'Non-selected Rental',
                selectedListLabel: 'Selected Rental',
                moveOnSelect: true,
                nonSelectedFilter: ''
            }
        ); </script>
        <br/>
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
            @if(isset($customer->store))
        <label class="text-danger text-md">Update Store</label>
    <select class="form-control" name="store"  disabled >
        @forelse(\App\Store::all() as  $store)
        <option value="{{$store->store_id}}" @if($store->store_id == $customer->store->store_id) selected = "selected" @endif>
            {{$store->address->address}}
        </option>
        @empty
        <option value="-1">No store</option>
        @endforelse
    </select><br/>
        @else
                    <label class="text-danger text-md">Update Store</label>
        <select class="form-control" name="store">
            @forelse(\App\Store::all() as  $store)
                <option value="{{$store->store_id}}">
                    {{$store->address->address}}
                </option>
            @empty
                <option value="-1">No store</option>
            @endforelse
        </select><br/>                @endif
     

    
    @if(isset($customer->payment))
            @else
        <label class="text-danger text-md">No payment related to this customer.</label>
    @endif
    
    @if(isset($customer->rental))
            @else
        <label class="text-danger text-md">No rental related to this customer.</label>
    @endif
    
    @if(isset($customer->address))
            @else
        <label class="text-danger text-md">No address related to this customer.</label>
    @endif
    
    @if(isset($customer->store))
            @else
        <label class="text-danger text-md">No store related to this customer.</label>
    @endif
     @endsection