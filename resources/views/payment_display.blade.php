@extends('master')
@section('content')
<h1 class="text-danger">Display Payment</h1>

    <a href="{{url("/payment/$payment->payment_id")}}/edit">Edit</a></br>

    <br/>


           
        <div class="form-group">
            <label class="text-danger text-md">Amount : </label>
            <input type ="number" class="form-control" name="amount"  data-plugin-maxlength="" maxlength="10"value = "{{$payment->amount}}"placeholder="Amount" readonly required />
        </div>
       

            @if(isset($payment->rental))
        <label class="text-danger text-md">Update Rental</label>
    <select class="form-control" name="rental"  disabled >
        @forelse(\App\Rental::all() as  $rental)
        <option value="{{$rental->rental_id}}" @if($rental->rental_id == $payment->rental->rental_id) selected = "selected" @endif>
            {{$rental->customer_id}}
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
                    {{$rental->customer_id}}
                </option>
            @empty
                <option value="-1">No rental</option>
            @endforelse
        </select><br/>                @endif
            @if(isset($payment->customer))
        <label class="text-danger text-md">Update Customer</label>
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
     

    
    @if(isset($payment->rental))
            @else
        <label class="text-danger text-md">No rental related to this payment.</label>
    @endif
    
    @if(isset($payment->customer))
            @else
        <label class="text-danger text-md">No customer related to this payment.</label>
    @endif
     @endsection