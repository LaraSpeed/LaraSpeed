@extends('master')
@section('content')
<h1 class="text-danger">Edit Rental</h1>
    <form method="post" action="{{url("rental/$rental->rental_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                      
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
     
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection