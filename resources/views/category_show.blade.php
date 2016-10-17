@extends('master')
@section('content')
<h1 class="text-danger">List of Categorys</h1>

<form action="{{url("/category/search")}}" method="get">
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
                <a href="http://localhost/category">Category_id</a>
            </th>              <th>
                <a href="http://localhost/category">Name</a>
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