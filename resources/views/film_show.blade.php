@extends('master')
@section('content')
<h1>Liste des Film</h1>
<table class="table table-striped">
    <thead>
        <tr>               <th>
                <a href="http://localhost/film">Title</a>
            </th>              <th>
                <a href="http://localhost/film">Description</a>
            </th>              <th>
                <a href="http://localhost/film">Release_year</a>
            </th>              <th>
                <a href="http://localhost/film">Original_language_id</a>
            </th>              <th>
                <a href="http://localhost/film">Rental_duration</a>
            </th>              <th>
                <a href="http://localhost/film">Rental_rate</a>
            </th>                <th>
                <a href="http://localhost/film">Replacement_cost</a>
            </th>       
        </tr>
    </thead>

    <tbody>
        @forelse($films as $film)
            <tr>
               <td><a href="film/{{$film->film_id}}">{{$film->title}}</a></td>
              <td><a href="film/{{$film->film_id}}">{{$film->description}}</a></td>
              <td><a href="film/{{$film->film_id}}">{{$film->release_year}}</a></td>
              <td><a href="film/{{$film->film_id}}">{{$film->original_language_id}}</a></td>
              <td><a href="film/{{$film->film_id}}">{{$film->rental_duration}}</a></td>
              <td><a href="film/{{$film->film_id}}">{{$film->rental_rate}}</a></td>
                <td><a href="film/{{$film->film_id}}">{{$film->replacement_cost}}</a></td>
           </tr>
        @empty
            <tr>
                <td>No film.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection