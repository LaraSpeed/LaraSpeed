@extends('master')
@section('content')
<h1 class="text-danger">List of Categorys</h1>

<div class="row">
    <div class="col-md-2 col-sm-2">
        <form action="{{url("/category")}}" method="get">
            <button type="submit" class="btn btn-primary">Clear Search</button>
        </form>
    </div>

    <div class="col-md-8 col-sm-8">
<form action="{{url("/category/search")}}" method="get">

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
        <form action="{{url("/category/create")}}" method="get">
            <button type="submit" class="btn btn-primary">Add new Category</button>
        </form>
    </div>
</div>
<br/>

<table class="table table-striped">
    <thead>
        <tr>
                         <th>
                <a href="{{url("/category/sort?category_id")}}">Category id</a>
            </th>              <th>
                <a href="{{url("/category/sort?name")}}">Name</a>
            </th>   
        </tr>
    </thead>

    <tbody>
        @forelse($categorys as $category)
            <tr>
             <td>{{$category->category_id}}</td>
              <td>{{$category->name}}</td>
               <td><form action="{{url("/category/$category->category_id")}}" method="get">
                <button type="submit" class="btn btn-link">View</button>
            </form>
        </td>
        <td><form action="{{url("/category/$category->category_id")}}/edit" method="get">
                <button type="submit" class="btn btn-link">Edit</button>
            </form>
        </td>
        <td><form action="{{url("/category/$category->category_id")}}" method="post">
                <input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}" /><button type="submit" class="btn btn-link">Delete</button>
            </form>
        </td>
                    <td>
                <form action="{{url("/category/related/$category->category_id")}}" method="get">
                    <button type="submit" class="btn btn-link">Film</button>
                </form>
            </td>
                    </tr>
        @empty
            <tr>
                <td>No category.</td>
            </tr>
        @endforelse
    </tbody>
</table>
{!!$categorys->links()!!}@endsection