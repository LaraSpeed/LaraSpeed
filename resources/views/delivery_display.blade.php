@extends('master')
@section('content')
<h1 class="text-danger">Display Delivery</h1>

    <a href="{{url("/delivery/$delivery->id")}}/edit">Edit</a></br>

    <br/>

       
    <label class="text-primary">Identifiant : </label>
    <p>{{$delivery->identifiant}}</p>

      
    <label class="text-primary">Date : </label>
    <p>{{$delivery->date}}</p>

      
    <label class="text-primary">Articles : </label>
    <p>{{$delivery->articles}}</p>

     
    @endsection