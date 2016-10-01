@extends('master')
@section('content')
<h1>Liste des Film</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>
                <a href="http://localhost">Titre</a>
            </th>
            <th>
                <a href="http://localhost">Annee</a>
            </th>
        </tr>
    </thead>

    <tbody>
        @forelse($films as $film)
            <tr>
                <td>$film->titre</td>
                <td>$film->annee</td>
            </tr>
        @empty
            <tr>
                <td>No film.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection