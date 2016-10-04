@extends('master')
@section('content')
<h1>Liste des Language</h1>
<table class="table table-striped">
    <thead>
        <tr>               <th>
                <a href="http://localhost/language">Name</a>
            </th>   
        </tr>
    </thead>

    <tbody>
        @forelse($languages as $language)
            <tr>
               <td><a href="language/{{$language->language_id}}">{{$language->name}}</a></td>
       </tr>
        @empty
            <tr>
                <td>No language.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection