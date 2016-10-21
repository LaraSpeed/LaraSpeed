@extends('master')
@section('content')
<h1 class="text-danger">List of Films</h1>

<div class="row">
    <div class="col-md-2 col-sm-2">
        <form action="{{url("/film")}}" method="get">
            <button type="submit" class="btn btn-primary">Clear Search</button>
        </form>
    </div>

    <div class="col-md-8 col-sm-8">
<form action="{{url("/film/search")}}" method="get">

    <div class="col-md-10 col-sm-10">
        <input  type="text" class="form-control" name="keyword" placeholder="{{session('keyword', 'Keyword')}}"/>
    </div>

    <div class="col-md-2 col-sm-2">
        <input type="submit" class="btn btn-primary" value="Search"/>
    </div>

</form>
    </div>
</div>
<br/>

<div class="row">
    <div class="col-md-2 col-sm-2">
        <form action="{{url("/film/create")}}" method="get">
            <button type="submit" class="btn btn-primary">Add new Film</button>
        </form>
    </div>
</div>
<br/>

<table class="table table-striped">
    <thead>
        <tr>
                             <th>
                <a href="{{url("/film/sort?title")}}">Title</a>
            </th>              <th>
                <a href="{{url("/film/sort?description")}}">Description</a>
            </th>              <th>
                <a href="{{url("/film/sort?release_year")}}">Release year</a>
            </th>                <th>
                <a href="{{url("/film/sort?rental_duration")}}">Rental duration</a>
            </th>              <th>
                <a href="{{url("/film/sort?rental_rate")}}">Rental rate</a>
            </th>              <th>
                <a href="{{url("/film/sort?length")}}">Length</a>
            </th>              <th>
                <a href="{{url("/film/sort?replacement_cost")}}">Replacement cost</a>
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