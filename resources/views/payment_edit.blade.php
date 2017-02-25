@extends('master')
@section('content')
<h1 class="text-danger">Edit Payment</h1>
    <form method="post" action="{{url("payment/$payment->payment_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
               
        <div class="form-group">
            <label class="text-danger text-md">Amount : </label>
                            <div class="input-group mb-md">
                    <span class="input-group-addon">$</span>
                    <input type ="number" class="form-control" name="amount"  data-plugin-maxlength="" maxlength="10"value = "{{$payment->amount}}"placeholder="Amount"  required />
                </div>
                    </div>
          
        <div class="form-group">
            <label class="text-danger text-md">Payment date : </label>
             <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" id="date" data-plugin-datepicker="" name="payment_date" value="{{$payment->payment_date}}" placeholder="MM/DD/-YYYY" type="text"/></div>         </div>
         
            @if(isset($payment->rental))
        <label class="text-danger text-md">Update Rental</label>
    <select class="form-control" name="rental" >
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
        </select><br/>            @endif
        @if(isset($payment->customer))
        <label class="text-danger text-md">Update Customer</label>
    <select class="form-control" name="customer" >
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
        </select><br/>            @endif
        @if(isset($payment->staff))
        <label class="text-danger text-md">Update Staff</label>
    <select class="form-control" name="staff" >
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
        </select><br/>            @endif
     
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection