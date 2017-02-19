@extends('master')
@section('content')
<h1 class="text-danger">Display Staff</h1>

    <a href="{{url("/staff/$staff->staff_id")}}/edit">Edit</a></br>

    <br/>


       
        <div class="form-group">
            <label class="text-danger text-md">First name : </label>
            <input type ="text" class="form-control" name="first_name" value = "{{$staff->first_name}}"placeholder="First name" readonly required />
        </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Last name : </label>
            <input type ="text" class="form-control" name="last_name" value = "{{$staff->last_name}}"placeholder="Last name" readonly required />
        </div>
        
        <div class="form-group">
            <label class="text-danger text-md">Email : </label>
            <input type ="text" class="form-control" name="email" value = "{{$staff->email}}"placeholder="Email" readonly required />
        </div>
        
        <div class="form-group">
            <label class="text-danger text-md">Active : </label>
            <input type ="number" class="form-control" name="active"  data-plugin-maxlength="" maxlength="10"value = "{{$staff->active}}"placeholder="Active" readonly required />
        </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Username : </label>
            <input type ="text" class="form-control" name="username" value = "{{$staff->username}}"placeholder="Username" readonly required />
        </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Password : </label>
            <input type ="text" class="form-control" name="password" value = "{{$staff->password}}"placeholder="Password" readonly required />
        </div>
       

            @if(isset($staff->rental))
        <label class="text-danger text-md">Add Rentals</label>
        <select id="rental" name="rental[]" multiple="multiple" size="10">
            @forelse(\App\Rental::all()->sortBy('customer_id') as  $rental)
                <option value="{{$rental->rental_id}}" @foreach($staff->rental as  $rentaltmp) @if($rentaltmp->rental_id == $rental->rental_id) selected = "selected" @endif @endforeach>
                    {{$rental->customer_id}}
                </option>
            @empty
                <option value="-1">No rental</option>
            @endforelse
        </select><br/>
        <script> $('#rental').bootstrapDualListbox(
            {
                nonSelectedListLabel: 'Non-selected Rental',
                selectedListLabel: 'Selected Rental',
                moveOnSelect: true,
                nonSelectedFilter: ''
            }
        ); </script>
        @else
                @endif
            @if(isset($staff->address))
        <label class="text-danger text-md">Update Address</label>
    <select class="form-control" name="address"  disabled >
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
        </select><br/>                @endif
     

    
    @if(isset($staff->rental))
            @else
        <label class="text-danger text-md">No rental related to this staff.</label>
    @endif
    
    @if(isset($staff->address))
            @else
        <label class="text-danger text-md">No address related to this staff.</label>
    @endif
     @endsection