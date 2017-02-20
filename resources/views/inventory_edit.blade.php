@extends('master')
@section('content')
<h1 class="text-danger">Edit Inventory</h1>
    <form method="post" action="{{url("inventory/$inventory->inventory_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                
            @if(isset($inventory->film))
        <label class="text-danger text-md">Update Film</label>
    <select class="form-control" name="film" >
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
        </select><br/>            @endif
        @if(isset($inventory->customer))
        <label class="text-danger text-md">Associate Customers</label>

        <select id="customer" name="customer[]"  multiple="multiple" size="10" >
            @forelse(\App\Customer::all()->sortBy('first_name') as  $customer)
                <option value="{{$customer->customer_id}}" @foreach($inventory->customer as  $customertmp) @if($customertmp->customer_id == $customer->customer_id) selected = "selected" @endif @endforeach>
                    {{$customer->first_name}}
                </option>
            @empty
                <option value="-1">No customer</option>
            @endforelse

        </select><br/>

            <script> $('#customer').bootstrapDualListbox(
                {
                    nonSelectedListLabel: 'Non-selected customer',
                    selectedListLabel: 'Selected customer',
                    moveOnSelect: true,
                    nonSelectedFilter: ''
                }
        ); </script>
    
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
        </select><br/>            @endif
     
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection