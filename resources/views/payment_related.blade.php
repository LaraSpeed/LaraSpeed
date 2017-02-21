@extends('master')
@section('content')
@if(isset($payment->rental) && "rental" == $table)
            <h3 class="text-danger">Rental : </h3>
     {{$payment->rental->rental_date}}
       {{$payment->rental->return_date}}
           @else

        @endif
        @if(isset($payment->customer) && "customer" == $table)
            <h3 class="text-danger">Customer : </h3>
      {{$payment->customer->first_name}}
     {{$payment->customer->last_name}}
     {{$payment->customer->email}}
      {{$payment->customer->active}}
     {{$payment->customer->create_date}}
          @else

        @endif
        @if(isset($payment->staff) && "staff" == $table)
            <h3 class="text-danger">Staff : </h3>
     {{$payment->staff->first_name}}
     {{$payment->staff->last_name}}
      {{$payment->staff->email}}
      {{$payment->staff->active}}
     {{$payment->staff->username}}
     {{$payment->staff->password}}
          @else

        @endif
 @endsection