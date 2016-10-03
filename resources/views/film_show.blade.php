@extends('master')
@section('content')
<h1>Liste des Film</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>
                <a href="http://localhost">Film_id</a>
            </th>
            <th>
                <a href="http://localhost">Title</a>
            </th>
            <th>
                <a href="http://localhost">Description</a>
            </th>
            <th>
                <a href="http://localhost">Release_year</a>
            </th>
            <th>
                <a href="http://localhost">Original_language_id</a>
            </th>
            <th>
                <a href="http://localhost">Rental_duration</a>
            </th>
            <th>
                <a href="http://localhost">Rental_rate</a>
            </th>
            <th>
                <a href="http://localhost">Length</a>
            </th>
            <th>
                <a href="http://localhost">Replacement_cost</a>
            </th>
            <th>
                <a href="http://localhost">Rating</a>
            </th>
            <th>
                <a href="http://localhost">Special_features</a>
            </th>
            <th>
                <a href="http://localhost">Last_update</a>
            </th>
        </tr>
    </thead>

    <tbody>
        @forelse($films as $film)
            <tr>
                <td>$film->film_id</td>
                <td>$film->title</td>
                <td>$film->description</td>
                <td>$film->release_year</td>
                <td>$film->original_language_id</td>
                <td>$film->rental_duration</td>
                <td>$film->rental_rate</td>
                <td>$film->length</td>
                <td>$film->replacement_cost</td>
                <td>$film->rating</td>
                <td>$film->special_features</td>
                <td>$film->last_update</td>
            </tr>
        @empty
            <tr>
                <td>No film.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection