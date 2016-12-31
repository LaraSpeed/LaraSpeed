@extends('master')
@section('content')
<h1 class="text-danger">Display Film</h1>

    <a href="{{url("/film/$film->film_id")}}/edit">Edit</a></br>

    <br/>

         
    <label class="text-primary">Title : </label>
    <p>{{$film->title}}</p>

      
    <label class="text-primary">Description : </label>
    <p>{{$film->description}}</p>

      
    <label class="text-primary">Release_year : </label>
    <p>{{$film->release_year}}</p>

        
    <label class="text-primary">Rental_duration : </label>
    <p>{{$film->rental_duration}}</p>

      
    <label class="text-primary">Rental_rate : </label>
    <p>{{$film->rental_rate}}</p>

      
    <label class="text-primary">Length : </label>
    <p>{{$film->length}}</p>

      
    <label class="text-primary">Replacement_cost : </label>
    <p>{{$film->replacement_cost}}</p>

           
    
    @if(isset($film->language))
            @else
        <label class="text-danger">No language related to this film.</label>
    @endif
    
    @if(isset($film->category))
            @else
        <label class="text-danger">No category related to this film.</label>
    @endif
     @endsection