@extends('master')
@section('content')
<h1>Liste des Acteur</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>
                <a href="http://localhost">Nom</a>
            </th>
            <th>
                <a href="http://localhost">Age</a>
            </th>
        </tr>
    </thead>

    <tbody>
        @forelse($acteurs as $acteur)
            <tr>
                <td>$acteur->nom</td>
                <td>$acteur->age</td>
            </tr>
        @empty
            <tr>
                <td>No acteur.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection