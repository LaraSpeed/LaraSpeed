@extends('master')
@section('content')
<h1 class="text-danger">List of Category</h1>
<table class="table table-striped">
    <thead>
        <tr><th>See</th>
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
                <td><a href="category/{{$category->category_id}}">See</a></td>
             <td>{{$category->category_id}}</td>
              <td>{{$category->name}}</td>
       </tr>
        @empty
            <tr>
                <td>No category.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection