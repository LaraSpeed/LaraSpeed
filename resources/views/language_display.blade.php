@extends('master')
@section('content')
<h1 class="text-danger">Display Language</h1>

    <a href="{{url("/language/$language->language_id")}}/edit">Edit</a></br>

    <br/>

       
    <label class="text-primary">Name : </label>
    <p>{{$language->name}}</p>

       
    
    @if(isset($language->film))
            @else
        <label class="text-danger">No film related to this language.</label>
    @endif
    @endsection