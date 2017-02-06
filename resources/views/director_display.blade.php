@extends('master')
@section('content')
<h1 class="text-danger">Display Director</h1>

    <a href="{{url("/director/$director->id")}}/edit">Edit</a></br>

    <br/>

       
    <label class="text-primary">Name : </label>
    <p>{{$director->name}}</p>

      
    <label class="text-primary">Birth : </label>
    <p>{{$director->birth}}</p>

      
    <label class="text-primary">Bio : </label>
    <p>{{$director->bio}}</p>

     
    
    @if(isset($director->film))
            @else
        <label class="text-danger">No film related to this director.</label>
    @endif
     @endsection