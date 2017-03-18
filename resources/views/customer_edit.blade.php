@extends('master')
@section('content')
<h1 class="text-danger">Edit Customer</h1>
    <form method="post" action="{{url("customer/$customer->customer_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
             
        <div class="form-group">
            <label class="text-danger text-md">First name : </label>
             <input type ="text" class="form-control" name="first_name" value = "{{$customer->first_name}}"placeholder="First name"  required />         </div>
          
        <div class="form-group">
            <label class="text-danger text-md">Last name : </label>
             <input type ="text" class="form-control" name="last_name" value = "{{$customer->last_name}}"placeholder="Last name"  required />         </div>
          
        <div class="form-group">
            <label class="text-danger text-md">Email : </label>
             <input type ="text" class="form-control" name="email" value = "{{$customer->email}}"placeholder="Email"  required />         </div>
            
        <div class="form-group">
            <label class="text-danger text-md">Active : </label>
             <input type ="checkbox" class="form-control" name="active"  checked  required />         </div>
          
        <div class="form-group">
            <label class="text-danger text-md">Create date : </label>
             <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" id="date" data-plugin-datepicker="" name="create_date" value="{{$customer->create_date}}" placeholder="MM/DD/-YYYY" type="text"/></div>         </div>
           
            @if(isset($customer->payment))
        
    @else
            @endif
          @if(isset($customer->address))
        <label class="text-danger text-md"> Update Address</label>
    <select class="form-control" name="address" >
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
        </select><br/>            @endif
         @if(isset($customer->store))
        <label class="text-danger text-md"> Update Store</label>
    <select class="form-control" name="store" >
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
        </select><br/>            @endif
      
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection