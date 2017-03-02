@extends('master')
@section('content')
<h1 class="text-danger">Display Rental</h1>

    <a href="{{url("/rental/$rental->rental_id")}}/edit">Edit</a></br>

    <br/>


       
        <div class="form-group">
            <label class="text-danger text-md">Rental date : </label>
             <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" id="date" data-plugin-datepicker="" name="rental_date" value="{{$rental->rental_date}}" placeholder="MM/DD/-YYYY" type="text"/></div>         </div>
          
        <div class="form-group">
            <label class="text-danger text-md">Return date : </label>
             <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" id="date" data-plugin-datepicker="" name="return_date" value="{{$rental->return_date}}" placeholder="MM/DD/-YYYY" type="text"/></div>         </div>
         

            @if(isset($rental->payment))
        <label class="text-danger text-md"> Payments</label>
        <select id="payment" name="payment[]"  multiple data-plugin-selectTwo class="form-control populate" disabled >
            @forelse(\App\Payment::all()->sortBy('payment_date') as  $payment)
                <option value="{{$payment->payment_id}}" @foreach($rental->payment as  $paymenttmp) @if($paymenttmp->payment_id == $payment->payment_id) selected = "selected" @endif @endforeach>
                    {{$payment->payment_date}}
                </option>
            @empty
                <option value="-1">No payment</option>
            @endforelse
        </select>

    
    <br/>
        @else
                @endif
            @if(isset($rental->staff))
        <label class="text-danger text-md">Staff</label>
    <select class="form-control" name="staff"  disabled >
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
        </select><br/>                @endif
            @if(isset($rental->customer))
        <label class="text-danger text-md">Customer</label>
    <select class="form-control" name="customer"  disabled >
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
        </select><br/>                @endif
     

    
    @if(isset($rental->payment))
            @else
        <label class="text-danger text-md">No payment related to this rental.</label>
    @endif
    
    @if(isset($rental->staff))
            @else
        <label class="text-danger text-md">No staff related to this rental.</label>
    @endif
    
    @if(isset($rental->customer))
            @else
        <label class="text-danger text-md">No customer related to this rental.</label>
    @endif
     @endsection