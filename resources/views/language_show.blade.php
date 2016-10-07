@extends('master')
@section('content')
<h1 class="text-danger">List of Language</h1>
<table class="table table-striped">
    <thead>
        <tr><th>See</th>
                           <th>
                <a href="http://localhost/language">Name</a>
            </th>   
        </tr>
    </thead>

    <tbody>
        @forelse($languages as $language)
            <tr>
                <td><a href="language/{{$language->language_id}}">See</a></td>
               <td>{{$language->name}}</td>
       </tr>
        @empty
            <tr>
                <td>No language.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection