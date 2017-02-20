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
                    <input type ="number" class="form-control" name="amount"  data-plugin-maxlength="" maxlength="10"value = "{{$payment->amount}}"placeholder="Amount" readonly required />
                </div>
                    </div>
           
            @if(isset($payment->rental))
        <label class="text-danger text-md">Update Rental</label>
    <select class="form-control" name="rental" >
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
     
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection