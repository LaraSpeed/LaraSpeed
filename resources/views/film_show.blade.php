@extends('master')
@section('content')
<h1 class="text-danger">List of Films</h1>

<form action="" method="get">
    <div class="form-group">
        <label>Search : </label>
        <input  type="text" class="form-control" name="filter" placeholder="Search"/>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Search"/>
    </div>
</form>

<table class="table table-striped">
    <thead>
        <tr>
                             <th>
                <a href="http://localhost/film">Title</a>
            </th>              <th>
                <a href="http://localhost/film">Description</a>
            </th>                  <th>
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
                 <td>{{$film->title}}</td>
              <td>{{$film->description}}</td>
                  <td>{{$film->rental_duration}}</td>
              <td>{{$film->rental_rate}}</td>
                <td>{{$film->replacement_cost}}</td>
                   <td><a href="film/{{$film->film_id}}">View</a></td>
        <td><a href="{{url("/film/$film->film_id")}}/edit">Edit</a></td>
                    <td><a href="#">Language</a></td>
                    <td><a href="#">Category</a></td>
                    </tr>
        @empty
            <tr>
                <td>No film.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection