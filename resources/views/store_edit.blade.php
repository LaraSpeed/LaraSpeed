@extends('master')
@section('content')
<h1 class="text-danger">Edit Store</h1>
    <form method="post" action="{{url("store/$store->store_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              
            @if(isset($store->address))
        <label class="text-danger text-md">Update Address</label>
    <select class="form-control" name="address" >
        @forelse(\App\Address::all() as  $address)
        <option value="{{$address->address_id}}" @if($address->address_id == $store->address->address_id) selected = "selected" @endif>
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
        @if(isset($store->staff))
        <label class="text-danger text-md">Add Staffs</label>
        <select id="staff" name="staff[]" multiple="multiple" size="10">
            @forelse(\App\Staff::paginate(5000)->sortBy('first_name') as  $staff)
                <option value="{{$staff->staff_id}}" @foreach($store->staff as  $stafftmp) @if($stafftmp->staff_id == $staff->staff_id) selected = "selected" @endif @endforeach>
                    {{$staff->first_name}}
                </option>
            @empty
                <option value="-1">No staff</option>
            @endforelse
        </select>
        {!!\App\Staff::paginate(5000)->links()!!}
        <script> $('#staff').bootstrapDualListbox(
            {
                nonSelectedListLabel: 'Non-selected Staff',
                selectedListLabel: 'Selected Staff',
                moveOnSelect: true,
                nonSelectedFilter: ''
            }
        ); </script>
        <br/>
    @else
            @endif
        @if(isset($store->film))
        <label class="text-danger text-md">Associate Films</label>

        <select id="film" name="film[]"  multiple="multiple" size="10" >
             @forelse(\App\Film::paginate(5000)->sortBy('title') as  $film)                 <option value="{{$film->film_id}}" @foreach($store->film as  $filmtmp) @if($filmtmp->film_id == $film->film_id) selected = "selected" @endif @endforeach>
                    {{$film->title}}
                </option>
            @empty
                <option value="-1">No film</option>
            @endforelse

        </select>

                    {!!\App\Film::paginate(5000)->links()!!}
            <script> $('#film').bootstrapDualListbox(
                {
                    nonSelectedListLabel: 'Non-selected film',
                    selectedListLabel: 'Selected film',
                    moveOnSelect: true,
                    nonSelectedFilter: ''
                }
            ); </script>
                <br/>


    @else
                    <label class="text-danger text-md">Associate Films</label>
        <select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one film"  name="film[]">
            @forelse(\App\Film::all()->sortBy('title') as  $film)
                <option value="{{$film->film_id}}">
                    {{$film->title}}
                </option>
            @empty
                <option value="-1">No film</option>
            @endforelse
        </select><br/>            @endif
        @if(isset($store->customer))
        <label class="text-danger text-md">Add Customers</label>
        <select id="customer" name="customer[]" multiple="multiple" size="10">
            @forelse(\App\Customer::paginate(5000)->sortBy('first_name') as  $customer)
                <option value="{{$customer->customer_id}}" @foreach($store->customer as  $customertmp) @if($customertmp->customer_id == $customer->customer_id) selected = "selected" @endif @endforeach>
                    {{$customer->first_name}}
                </option>
            @empty
                <option value="-1">No customer</option>
            @endforelse
        </select>
        {!!\App\Customer::paginate(5000)->links()!!}
        <script> $('#customer').bootstrapDualListbox(
            {
                nonSelectedListLabel: 'Non-selected Customer',
                selectedListLabel: 'Selected Customer',
                moveOnSelect: true,
                nonSelectedFilter: ''
            }
        ); </script>
        <br/>
    @else
            @endif
     
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection