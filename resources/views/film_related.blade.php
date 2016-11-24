@extends('master')
@section('content')
@if(isset($film->language) && "language" == $table)
    <h3 class="text-danger">Language : </h3>
     {{$film->language->name}}
      @else

    @endif
    @if(isset($film->category) && "category" == $table)
    <div class="row">
    <div class="col-md-4">
        <h1 class="text-danger">List of Categorys</h1>
    </div>

    <div class="col-md-5">
        {{ session(['defaultSelect' => $film->film_id]) }}
        <h4 class="text-danger"><b>Film : {{$film->title}}</b></h4>
    </div>
</div>

<div class="row">

    <div class="col-md-8 col-sm-8">
        <form action="{{url("/film/search")}}" method="get">
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
        <form action="{{url("/category/create")}}" method="get">
            <button type="submit" class="btn btn-primary">Add new Category</button>
        </form>
    </div>
</div>
<br/>


<table class="table table-striped">
    <thead>
    <tr>
                       <th class="c_string">
                <form action="{{url("/film/sort")}}" method="get">
                    <input type="hidden" name="name"/>
                    <input type="hidden" name="tab" value="{{$table}}" />
                    <button class="btn btn-link" type="submit"><p @if(session('name', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Name <img src="{{ URL::asset(session('name', 'none').'.png') }}" /></p></button>
                </form>
            </th>   
    </tr>
    </thead>

    <tbody>
    @forelse($film->category_paginated as  $category)
    <tr>
                       <td class="c_string">{{$category->name}}</td>
                   <td class="defaut"><form action="{{url("/category/$category->category_id")}}" method="get">
                <button type="submit" class="btn btn-link">View</button>
            </form>
        </td>
        <td class="defaut"><form action="{{url("/category/$category->category_id")}}/edit" method="get">
                <button type="submit" class="btn btn-link">Edit</button>
            </form>
        </td>
        <td class="defaut">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <button type="submit" class="btn btn-link" ng-click="showModal('Delete', 'Do you really want to delete {{ $category->name}} ?', '{{url("/category/$category->category_id")}}')">Delete</button>
        </td>
                    <td class="defaut">
                <form action="{{url("/category/related/$category->category_id")}}" method="get">
                    <input type="hidden" name="tab" value="film" />
                    <button type="submit" class="btn btn-link">Film</button>
                </form>
            </td>
            </tr>
    @empty
    <tr>
        <td colspan="3"><label class="text-danger">No category matching keyword {{session('keyword', 'Keyword')}}.</label></td>
    </tr>
    @endforelse
    </tbody>
</table>
{!!$film->category_paginated->links()!!}    @else

    @endif
@endsection