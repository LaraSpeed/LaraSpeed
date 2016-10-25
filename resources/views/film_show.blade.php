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
                <form action="{{url("/film/sort")}}" method="get">
                    <input type="hidden" name="title"/>
                <button class="btn btn-link" type="submit">Title <img src="{{ URL::asset(session('title', 'none').'.png') }}" /></button>
                </form>
            </th>              <th>
                <form action="{{url("/film/sort")}}" method="get">
                    <input type="hidden" name="description"/>
                <button class="btn btn-link" type="submit">Description <img src="{{ URL::asset(session('description', 'none').'.png') }}" /></button>
                </form>
            </th>              <th>
                <form action="{{url("/film/sort")}}" method="get">
                    <input type="hidden" name="release_year"/>
                <button class="btn btn-link" type="submit">Release year <img src="{{ URL::asset(session('release_year', 'none').'.png') }}" /></button>
                </form>
            </th>                <th>
                <form action="{{url("/film/sort")}}" method="get">
                    <input type="hidden" name="rental_duration"/>
                <button class="btn btn-link" type="submit">Rental duration <img src="{{ URL::asset(session('rental_duration', 'none').'.png') }}" /></button>
                </form>
            </th>              <th>
                <form action="{{url("/film/sort")}}" method="get">
                    <input type="hidden" name="rental_rate"/>
                <button class="btn btn-link" type="submit">Rental rate <img src="{{ URL::asset(session('rental_rate', 'none').'.png') }}" /></button>
                </form>
            </th>              <th>
                <form action="{{url("/film/sort")}}" method="get">
                    <input type="hidden" name="length"/>
                <button class="btn btn-link" type="submit">Length <img src="{{ URL::asset(session('length', 'none').'.png') }}" /></button>
                </form>
            </th>              <th>
                <form action="{{url("/film/sort")}}" method="get">
                    <input type="hidden" name="replacement_cost"/>
                <button class="btn btn-link" type="submit">Replacement cost <img src="{{ URL::asset(session('replacement_cost', 'none').'.png') }}" /></button>
                </form>
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
        <td>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <button type="submit" class="btn btn-link" ng-click="showModal('Delete', 'Do you really want to delete this film', '{{url("/film/$film->film_id")}}')">Delete</button>
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
                <td>No film matching keyword {{session('keyword', 'Keyword')}}.</td>
            </tr>
        @endforelse
    </tbody>
</table>
{!!$films->links()!!}@endsection