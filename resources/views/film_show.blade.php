@extends('master')
@section('content')
<h1 class="text-danger">List of Film</h1>
<table class="table table-striped">
    <thead>
        <tr><th>See</th>
                             <th>
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
                <td><a href="film/{{$film->film_id}}">See</a></td>
                 <td>{{$film->title}}</td>
              <td>{{$film->description}}</td>
              <td>{{$film->release_year}}</td>
              <td>{{$film->original_language_id}}</td>
              <td>{{$film->rental_duration}}</td>
              <td>{{$film->rental_rate}}</td>
                <td>{{$film->replacement_cost}}</td>
           </tr>
        @empty
            <tr>
                <td>No film.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection