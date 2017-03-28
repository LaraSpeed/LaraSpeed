@extends('master')
@section('content')
<h1 class="text-danger">Display Payment</h1>

    <a href="{{url("/payment/$payment->payment_id")}}/edit">Edit</a></br>

    <br/>


           
        <div class="form-group">
            <label class="text-danger text-md">Amount : </label>
                            <div class="input-group mb-md">
                    <span class="input-group-addon">$</span>
                    <input type ="number" class="form-control" name="amount"  data-plugin-maxlength="" step="any" maxlength="10"value = "{{$payment->amount}}"placeholder="Amount" readonly required />
                </div>
                    </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Payment date : </label>
             <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" id="date" data-plugin-datepicker="" name="payment_date" value="{{$payment->payment_date}}" placeholder="MM/DD/-YYYY" type="text"/></div>         </div>
     

            @if(isset($payment->rental))
        <label class="text-danger text-md">Rental</label>
    <select class="form-control" name="rental"  disabled >
        @forelse(\App\Rental::all() as  $rental)
        <option value="{{$rental->rental_id}}" @if($rental->rental_id == $payment->rental->rental_id) selected = "selected" @endif>
            {{$rental->rental_date}}
        </option>
        @empty
        <option value="-1">No rental</option>
        @endforelse
    </select><br/>
        @else
                    <label class="text-danger text-md">Update Rental</label>
        <select class="form-control" name="rental">
            @forelse(\App\Rental::all() as  $rental)
                <option value="{{$rental->rental_id}}">
                    {{$rental->rental_date}}
                </option>
            @empty
                <option value="-1">No rental</option>
            @endforelse
        </select><br/>                @endif
            @if(isset($payment->customer))
        <label class="text-danger text-md">Customer</label>
    <select class="form-control" name="customer"  disabled >
        @forelse(\App\Customer::all() as  $customer)
        <option value="{{$customer->customer_id}}" @if($customer->customer_id == $payment->customer->customer_id) selected = "selected" @endif>
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
        </select><br/>                @endif
            @if(isset($payment->staff))
        <label class="text-danger text-md">Staff</label>
    <select class="form-control" name="staff"  disabled >
        @forelse(\App\Staff::all() as  $staff)
        <option value="{{$staff->staff_id}}" @if($staff->staff_id == $payment->staff->staff_id) selected = "selected" @endif>
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
        </select><br/>                @endif
     

    
    @if(isset($payment->rental))
            @else
        <label class="text-danger text-md">No rental related to this payment.</label>
    @endif
    
    @if(isset($payment->customer))
            @else
        <label class="text-danger text-md">No customer related to this payment.</label>
    @endif
    
    @if(isset($payment->staff))
            @else
        <label class="text-danger text-md">No staff related to this payment.</label>
    @endif
     @endsection