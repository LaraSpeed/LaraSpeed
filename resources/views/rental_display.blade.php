@extends('master')
@section('content')
<h1 class="text-danger">Display Rental</h1>

    <a href="{{url("/rental/$rental->rental_id")}}/edit">Edit</a></br>

    <br/>


                  

            @if(isset($rental->payment))
        <label class="text-danger text-md">Add Payment</label>
        <select id="payment" name="payment[]" multiple="multiple" size="10">
            @forelse(\App\Payment::all()->sortBy('amount') as  $payment)
                <option value="{{$payment->payment_id}}" @foreach($rental->payment as  $paymenttmp) @if($paymenttmp->payment_id == $payment->payment_id) selected = "selected" @endif @endforeach>
                    {{$payment->amount}}
                </option>
            @empty
                <option value="-1">No payment</option>
            @endforelse
        </select><br/>
        <script> $('#payment').bootstrapDualListbox(
            {
                nonSelectedListLabel: 'Non-selected Payment',
                selectedListLabel: 'Selected Payment',
                moveOnSelect: true,
                nonSelectedFilter: ''
            }
        ); </script>
        @else
                @endif
            @if(isset($rental->staff))
        <label class="text-danger text-md">Update Staff</label>
    <select class="form-control" name="staff"  disabled >
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
        </select><br/>                @endif
     

    
    @if(isset($rental->payment))
            @else
        <label class="text-danger text-md">No payment related to this rental.</label>
    @endif
    
    @if(isset($rental->staff))
            @else
        <label class="text-danger text-md">No staff related to this rental.</label>
    @endif
     @endsection