@extends('master')
@section('content')
<h1 class="text-danger">Display Inventory</h1>

    <a href="{{url("/inventory/$inventory->inventory_id")}}/edit">Edit</a></br>

    <br/>


            

            @if(isset($inventory->film))
        <label class="text-danger text-md">Update Film</label>
    <select class="form-control" name="film"  disabled >
        @forelse(\App\Film::all() as  $film)
        <option value="{{$film->film_id}}" @if($film->film_id == $inventory->film->film_id) selected = "selected" @endif>
            {{$film->title}}
        </option>
        @empty
        <option value="-1">No film</option>
        @endforelse
    </select><br/>
        @else
                    <label class="text-danger text-md">Update Film</label>
        <select class="form-control" name="film">
            @forelse(\App\Film::all() as  $film)
                <option value="{{$film->film_id}}">
                    {{$film->title}}
                </option>
            @empty
                <option value="-1">No film</option>
            @endforelse
        </select><br/>                @endif
            @if(isset($inventory->customer))
        <label class="text-danger text-md">Associate Customer</label>

        <select id="customer" name="customer[]"  multiple data-plugin-selectTwo class="form-control populate" disabled >
            @forelse(\App\Customer::all()->sortBy('first_name') as  $customer)
                <option value="{{$customer->customer_id}}" @foreach($inventory->customer as  $customertmp) @if($customertmp->customer_id == $customer->customer_id) selected = "selected" @endif @endforeach>
                    {{$customer->first_name}}
                </option>
            @empty
                <option value="-1">No customer</option>
            @endforelse

        </select><br/>

    
        @else
                    <label class="text-danger text-md">Associate Customers</label>
        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one customer"  name="customer[]">
            @forelse(\App\Customer::all()->sortBy('first_name') as  $customer)
                <option value="{{$customer->customer_id}}">
                    {{$customer->first_name}}
                </option>
            @empty
                <option value="-1">No customer</option>
            @endforelse
        </select><br/>                @endif
     

    
    @if(isset($inventory->film))
            @else
        <label class="text-danger text-md">No film related to this inventory.</label>
    @endif
    
    @if(isset($inventory->customer))
            @else
        <label class="text-danger text-md">No customer related to this inventory.</label>
    @endif
     @endsection