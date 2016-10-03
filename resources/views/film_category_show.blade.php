@extends('master')
@section('content')
<h1>Liste des Film_category</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>
                <a href="http://localhost">Film_id</a>
            </th>
            <th>
                <a href="http://localhost">Category_id</a>
            </th>
            <th>
                <a href="http://localhost">Last_update</a>
            </th>
        </tr>
    </thead>

    <tbody>
        @forelse($film_categorys as $film_category)
            <tr>
                <td>$film_category->film_id</td>
                <td>$film_category->category_id</td>
                <td>$film_category->last_update</td>
            </tr>
        @empty
            <tr>
                <td>No film_category.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection