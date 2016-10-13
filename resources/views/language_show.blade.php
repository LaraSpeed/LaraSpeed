@extends('master')
@section('content')
<h1 class="text-danger">List of Languages</h1>

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
                <a href="http://localhost/language">Name</a>
            </th>   
        </tr>
    </thead>

    <tbody>
        @forelse($languages as $language)
            <tr>
               <td>{{$language->name}}</td>
               <td><a href="language/{{$language->language_id}}">View</a></td>
        <td><a href="{{url("/language/$language->language_id")}}/edit">Edit</a></td>
                    <td><a href="#">Film</a></td>
                    </tr>
        @empty
            <tr>
                <td>No language.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection