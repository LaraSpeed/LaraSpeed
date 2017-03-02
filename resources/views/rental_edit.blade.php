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
             
             @if(isset($rental->staff))
        <label class="text-danger text-md"> Update Staff</label>
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
        <label class="text-danger text-md"> Update Customer</label>
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
      
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection