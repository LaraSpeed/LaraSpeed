@extends('master')
@section('content')
<h1 class="text-danger">List of Categorys</h1>

<div class="row">

    <div class="col-md-8 col-sm-8">
<form action="{{url("/category/search")}}" method="get">

    <div class="col-md-2 col-sm-2">
        <input type="submit" class="btn btn-primary" value="Search"/>
    </div>

    <div class="col-md-10 col-sm-10">
        <input  type="text" class="form-control" name="keyword" placeholder="{{session('keyword', 'Keyword')}}"/>
    </div>


</form>
    </div>

    <div class="col-md-1 col-sm-1">
        <form action="{{url("/category")}}" method="get">
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
                         <th class="c_numeric">
                <form action="{{url("/category/sort")}}" method="get">
                    <input type="hidden" name="category_id"/>
                <button class="btn btn-link" type="submit"><p @if(session('category_id', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Category<br/>id <img src="{{ URL::asset(session('category_id', 'none').'.png') }}" /></p></button>
                </form>
            </th>              <th class="c_string">
                <form action="{{url("/category/sort")}}" method="get">
                    <input type="hidden" name="name"/>
                <button class="btn btn-link" type="submit"><p @if(session('name', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Name <img src="{{ URL::asset(session('name', 'none').'.png') }}" /></p></button>
                </form>
            </th>   
        </tr>
    </thead>

    <tbody>
        @forelse($categorys as $category)
            <tr>
             <td class="c_numeric">{{$category->category_id}}</td>
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
{!!$categorys->links()!!}@endsection