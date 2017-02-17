@extends('master')
@section('content')
@if(isset($payment->rental) && "rental" == $table)
            <h3 class="text-danger">Rental : </h3>
               @else

        @endif
        @if(isset($payment->customer) && "customer" == $table)
            <h3 class="text-danger">Customer : </h3>
      {{$payment->customer->first_name}}
     {{$payment->customer->last_name}}
     {{$payment->customer->email}}
       {{$payment->customer->create_date}}
          @else

        @endif
 @endsection