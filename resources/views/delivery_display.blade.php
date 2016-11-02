@extends('master')
@section('content')
<h1 class="text-danger">Display Delivery</h1>

<a href="{{url("/delivery/$delivery->id")}}/edit">Edit</a></br>

   <label class="text-primary">Identifiant : </label>
<p>{{$delivery->identifiant}}</p>
  <label class="text-primary">Date : </label>
<p>{{$delivery->date}}</p>
  <label class="text-primary">Articles : </label>
<p>{{$delivery->articles}}</p>
 
    @if(isset($delivery->film))
        @else
        <label class="text-danger">No film related to this delivery.</label>
    @endif
@endsection