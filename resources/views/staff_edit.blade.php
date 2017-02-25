@extends('master')
@section('content')
<h1 class="text-danger">Edit Staff</h1>
    <form method="post" action="{{url("staff/$staff->staff_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
           
        <div class="form-group">
            <label class="text-danger text-md">First name : </label>
             <input type ="text" class="form-control" name="first_name" value = "{{$staff->first_name}}"placeholder="First name"  required />         </div>
          
        <div class="form-group">
            <label class="text-danger text-md">Last name : </label>
             <input type ="text" class="form-control" name="last_name" value = "{{$staff->last_name}}"placeholder="Last name"  required />         </div>
            
        <div class="form-group">
            <label class="text-danger text-md">Email : </label>
             <input type ="text" class="form-control" name="email" value = "{{$staff->email}}"placeholder="Email"  required />         </div>
            
        <div class="form-group">
            <label class="text-danger text-md">Active : </label>
             <input type ="number" class="form-control" name="active"  data-plugin-maxlength="" maxlength="10"value = "{{$staff->active}}"placeholder="Active"  required />         </div>
          
        <div class="form-group">
            <label class="text-danger text-md">Username : </label>
             <input type ="text" class="form-control" name="username" value = "{{$staff->username}}"placeholder="Username"  required />         </div>
          
        <div class="form-group">
            <label class="text-danger text-md">Password : </label>
             <input type ="text" class="form-control" name="password" value = "{{$staff->password}}"placeholder="Password"  required />         </div>
           
            @if(isset($staff->rental))
        <label class="text-danger text-md">Add Rentals</label>
        <select id="rental" name="rental[]" multiple="multiple" size="10">
            @forelse(\App\Rental::paginate(5000)->sortBy('rental_date') as  $rental)
                <option value="{{$rental->rental_id}}" @foreach($staff->rental as  $rentaltmp) @if($rentaltmp->rental_id == $rental->rental_id) selected = "selected" @endif @endforeach>
                    {{$rental->rental_date}}
                </option>
            @empty
                <option value="-1">No rental</option>
            @endforelse
        </select>
        {!!\App\Rental::paginate(5000)->links()!!}
        <script> $('#rental').bootstrapDualListbox(
            {
                nonSelectedListLabel: 'Non-selected Rental',
                selectedListLabel: 'Selected Rental',
                moveOnSelect: true,
                nonSelectedFilter: ''
            }
        ); </script>
        <br/>
    @else
            @endif
        @if(isset($staff->payment))
        <label class="text-danger text-md">Add Payments</label>
        <select id="payment" name="payment[]" multiple="multiple" size="10">
            @forelse(\App\Payment::paginate(5000)->sortBy('payment_date') as  $payment)
                <option value="{{$payment->payment_id}}" @foreach($staff->payment as  $paymenttmp) @if($paymenttmp->payment_id == $payment->payment_id) selected = "selected" @endif @endforeach>
                    {{$payment->payment_date}}
                </option>
            @empty
                <option value="-1">No payment</option>
            @endforelse
        </select>
        {!!\App\Payment::paginate(5000)->links()!!}
        <script> $('#payment').bootstrapDualListbox(
            {
                nonSelectedListLabel: 'Non-selected Payment',
                selectedListLabel: 'Selected Payment',
                moveOnSelect: true,
                nonSelectedFilter: ''
            }
        ); </script>
        <br/>
    @else
            @endif
        @if(isset($staff->address))
        <label class="text-danger text-md">Update Address</label>
    <select class="form-control" name="address" >
        @forelse(\App\Address::all() as  $address)
        <option value="{{$address->address_id}}" @if($address->address_id == $staff->address->address_id) selected = "selected" @endif>
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
        @if(isset($staff->store))
        <label class="text-danger text-md">Update Store</label>
    <select class="form-control" name="store" >
        @forelse(\App\Store::all() as  $store)
        <option value="{{$store->store_id}}" @if($store->store_id == $staff->store->store_id) selected = "selected" @endif>
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