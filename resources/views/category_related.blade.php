@extends('master')
@section('content')
@if(isset($category->film) && "film" == $table)
    <div class="row">
    <div class="col-md-4">
        <h1 class="text-danger">List of Films</h1>
    </div>

    <div class="col-md-5">
        {{ session(['defaultSelect' => $category->category_id]) }}
        <h4 class="text-danger"><b>Category : {{$category->name}}</b></h4>
    </div>
</div>

<div class="row">

    <div class="col-md-8 col-sm-8">
        <form action="{{url("/category/search")}}" method="get">
            <input type="hidden" name="tab" value="{{$table}}" />
            <div class="col-md-2 col-sm-2">
                <input type="submit" class="btn btn-primary" value="Search"/>
            </div>

            <div class="col-md-10 col-sm-10">
                <input  type="text" class="form-control" name="keyword" placeholder="{{session('keyword', 'Keyword')}}"/>
            </div>


        </form>
    </div>

    <div class="col-md-1 col-sm-1">
        <form action="{{url(Request::url())}}" method="get">
            <input type="hidden" name="cs" />
            <button type="submit" class="btn btn-primary">Clear Search</button>
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
                         <th class="c_string">
                <form action="{{url("/category/sort")}}" method="get">
                    <input type="hidden" name="title"/>
                    <input type="hidden" name="tab" value="{{$table}}" />
                    <button class="btn btn-link" type="submit"><p @if(session('title', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Title <img src="{{ URL::asset(session('title', 'none').'.png') }}" /></p></button>
                </form>
            </th>              <th class="c_text">
                <form action="{{url("/category/sort")}}" method="get">
                    <input type="hidden" name="description"/>
                    <input type="hidden" name="tab" value="{{$table}}" />
                    <button class="btn btn-link" type="submit"><p @if(session('description', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Description <img src="{{ URL::asset(session('description', 'none').'.png') }}" /></p></button>
                </form>
            </th>              <th class="c_numeric">
                <form action="{{url("/category/sort")}}" method="get">
                    <input type="hidden" name="release_year"/>
                    <input type="hidden" name="tab" value="{{$table}}" />
                    <button class="btn btn-link" type="submit"><p @if(session('release_year', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Release<br/>year <img src="{{ URL::asset(session('release_year', 'none').'.png') }}" /></p></button>
                </form>
            </th>                <th class="c_numeric">
                <form action="{{url("/category/sort")}}" method="get">
                    <input type="hidden" name="rental_duration"/>
                    <input type="hidden" name="tab" value="{{$table}}" />
                    <button class="btn btn-link" type="submit"><p @if(session('rental_duration', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Rental<br/>duration <img src="{{ URL::asset(session('rental_duration', 'none').'.png') }}" /></p></button>
                </form>
            </th>              <th class="c_numeric">
                <form action="{{url("/category/sort")}}" method="get">
                    <input type="hidden" name="rental_rate"/>
                    <input type="hidden" name="tab" value="{{$table}}" />
                    <button class="btn btn-link" type="submit"><p @if(session('rental_rate', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Rental<br/>rate <img src="{{ URL::asset(session('rental_rate', 'none').'.png') }}" /></p></button>
                </form>
            </th>              <th class="c_numeric">
                <form action="{{url("/category/sort")}}" method="get">
                    <input type="hidden" name="length"/>
                    <input type="hidden" name="tab" value="{{$table}}" />
                    <button class="btn btn-link" type="submit"><p @if(session('length', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Length <img src="{{ URL::asset(session('length', 'none').'.png') }}" /></p></button>
                </form>
            </th>              <th class="c_numeric">
                <form action="{{url("/category/sort")}}" method="get">
                    <input type="hidden" name="replacement_cost"/>
                    <input type="hidden" name="tab" value="{{$table}}" />
                    <button class="btn btn-link" type="submit"><p @if(session('replacement_cost', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Replacement<br/>cost <img src="{{ URL::asset(session('replacement_cost', 'none').'.png') }}" /></p></button>
                </form>
            </th>       
    </tr>
    </thead>

    <tbody>
    @forelse($category->film_paginated as  $film)
    <tr>
                         <td class="c_string">{{$film->title}}</td>
                      <td class="c_text">{{$film->description}}</td>
                      <td class="c_numeric">{{$film->release_year}}</td>
                        <td class="c_numeric">{{$film->rental_duration}}</td>
                      <td class="c_numeric">{{$film->rental_rate}}</td>
                      <td class="c_numeric">{{$film->length}}</td>
                      <td class="c_numeric">{{$film->replacement_cost}}</td>
                       <td class="defaut"><form action="{{url("/film/$film->film_id")}}" method="get">
                <button type="submit" class="btn btn-link">View</button>
            </form>
        </td>
        <td class="defaut"><form action="{{url("/film/$film->film_id")}}/edit" method="get">
                <button type="submit" class="btn btn-link">Edit</button>
            </form>
        </td>
        <td class="defaut">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <button type="submit" class="btn btn-link" ng-click="showModal('Delete', 'Do you really want to delete {{ $film->title}} ?', '{{url("/film/$film->film_id")}}')">Delete</button>
        </td>
                    <td class="defaut">
                <form action="{{url("/film/related/$film->film_id")}}" method="get">
                    <input type="hidden" name="tab" value="language" />
                    <button type="submit" class="btn btn-link">Language</button>
                </form>
            </td>
                    <td class="defaut">
                <form action="{{url("/film/related/$film->film_id")}}" method="get">
                    <input type="hidden" name="tab" value="category" />
                    <button type="submit" class="btn btn-link">Category</button>
                </form>
            </td>
            </tr>
    @empty
    <tr>
        <td colspan="13"><label class="text-danger">No film matching keyword {{session('keyword', 'Keyword')}}.</label></td>
    </tr>
    @endforelse
    </tbody>
</table>
{!!$category->film_paginated->links()!!}    @else

    @endif
@endsection