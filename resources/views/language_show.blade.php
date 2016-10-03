@extends('master')
@section('content')
<h1>Liste des Language</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>
                <a href="http://localhost">Language_id</a>
            </th>
            <th>
                <a href="http://localhost">Name</a>
            </th>
            <th>
                <a href="http://localhost">Last_update</a>
            </th>
        </tr>
    </thead>

    <tbody>
        @forelse($languages as $language)
            <tr>
                <td>$language->language_id</td>
                <td>$language->name</td>
                <td>$language->last_update</td>
            </tr>
        @empty
            <tr>
                <td>No language.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection