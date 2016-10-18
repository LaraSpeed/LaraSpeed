@extends('master')
@section('content')
<h1 class="text-danger">List of Films</h1>

<form action="{{url("/film/search")}}" method="get">
    <div class="form-group">
        <label>Search : </label>
        <input  type="text" class="form-control" name="keyword" placeholder="Keyword"/>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Search"/>
    </div>
</form>

<table class="table table-striped">
    <thead>
        <tr>
                             <th>
                <a href="{{url("/film/sort?title")}}">Title</a>
            </th>              <th>
                <a href="{{url("/film/sort?description")}}">Description</a>
            </th>              <th>
                <a href="{{url("/film/sort?release_year")}}">Release_year</a>
            </th>                <th>
                <a href="{{url("/film/sort?rental_duration")}}">Rental_duration</a>
            </th>              <th>
                <a href="{{url("/film/sort?rental_rate")}}">Rental_rate</a>
            </th>              <th>
                <a href="{{url("/film/sort?length")}}">Length</a>
            </th>              <th>
                <a href="{{url("/film/sort?replacement_cost")}}">Replacement_cost</a>
            </th>       
        </tr>
    </thead>

    <tbody>
        @forelse($films as $film)
            <tr>
                 <td>{{$film->title}}</td>
              <td>{{$film->description}}</td>
              <td>{{$film->release_year}}</td>
                <td>{{$film->rental_duration}}</td>
              <td>{{$film->rental_rate}}</td>
              <td>{{$film->length}}</td>
              <td>{{$film->replacement_cost}}</td>
                   <td><form action="{{url("/film/$film->film_id")}}" method="get">
                <button type="submit" class="btn btn-link">View</button>
            </form>
        </td>
        <td><form action="{{url("/film/$film->film_id")}}/edit" method="get">
                <button type="submit" class="btn btn-link">Edit</button>
            </form>
        </td>
        <td><form action="{{url("/film/$film->film_id")}}" method="post">
                <input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}" /><button type="submit" class="btn btn-link">Delete</button>
            </form>
        </td>
                    <td>
                <form action="{{url("/film/related/$film->film_id")}}" method="get">
                    <button type="submit" class="btn btn-link">Language</button>
                </form>
            </td>
                    <td>
                <form action="{{url("/film/related/$film->film_id")}}" method="get">
                    <button type="submit" class="btn btn-link">Category</button>
                </form>
            </td>
                    </tr>
        @empty
            <tr>
                <td>No film.</td>
            </tr>
        @endforelse
    </tbody>
</table>
{!!$films->links()!!}@endsection