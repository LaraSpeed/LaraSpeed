@extends('master')
@section('content')
<h1 class="text-danger">Display Film</h1>

    <a href="{{url("/film/$film->id")}}/edit">Edit</a></br>

    <br/>

       
    <label class="text-primary">Title : </label>
    <p>{{$film->title}}</p>

      
    <label class="text-primary">Description : </label>
    <p>{{$film->description}}</p>

      
    <label class="text-primary">Price : </label>
    <p>{{$film->price}}</p>

      
    <label class="text-primary">Famous : </label>
    <p>{{$film->famous}}</p>

     
    
    @if(isset($film->director))
            @else
        <label class="text-danger">No director related to this film.</label>
    @endif
     @endsection