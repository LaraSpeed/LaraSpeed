@extends('master')
@section('content')
<h1 class="text-danger">List of Categorys</h1>

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
               <td><a href="category/{{$category->category_id}}">View</a></td>
        <td><a href="{{url("/category/$category->category_id")}}/edit">Edit</a></td>
                    <td><a href="#">Film</a></td>
                    </tr>
        @empty
            <tr>
                <td>No category.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection