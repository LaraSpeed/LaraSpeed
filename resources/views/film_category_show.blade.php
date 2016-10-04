@extends('master')
@section('content')
<h1>Liste des Film_category</h1>
<table class="table table-striped">
    <thead>
        <tr>               <th>
                <a href="http://localhost/film_category">Category_id</a>
            </th>   
        </tr>
    </thead>

    <tbody>
        @forelse($film_categorys as $film_category)
            <tr>
               <td><a href="film_category/{{$film_category->film_id}}">{{$film_category->category_id}}</a></td>
       </tr>
        @empty
            <tr>
                <td>No film_category.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection