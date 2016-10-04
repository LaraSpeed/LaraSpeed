@extends('master')
@section('content')
<h1>Affichage language</h1>

   <label class="text-danger">Name : </label>
<p>{{$language->name}}</p>
   @endsection