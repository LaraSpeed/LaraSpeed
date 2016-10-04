@extends('master')
@section('content')
<h1>Affichage film</h1>

   <label class="text-danger">Title : </label>
<p>{{$film->title}}</p>
  <label class="text-danger">Description : </label>
<p>{{$film->description}}</p>
  <label class="text-danger">Release_year : </label>
<p>{{$film->release_year}}</p>
  <label class="text-danger">Original_language_id : </label>
<p>{{$film->original_language_id}}</p>
  <label class="text-danger">Rental_duration : </label>
<p>{{$film->rental_duration}}</p>
  <label class="text-danger">Rental_rate : </label>
<p>{{$film->rental_rate}}</p>
    <label class="text-danger">Replacement_cost : </label>
<p>{{$film->replacement_cost}}</p>
       @endsection