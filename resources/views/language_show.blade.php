@extends('master')
@section('content')
<h1 class="text-danger">List of Languages</h1>

<form action="{{url("/language/search")}}" method="get">
    <div class="form-group">
        <label>Search : </label>
        <input  type="text" class="form-control" name="keyword" placeholder="Keyword"/>
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
               <td><form action="{{url("/language/$language->language_id")}}" method="get">
                <button type="submit" class="btn btn-link">View</button>
            </form>
        </td>
        <td><form action="{{url("/language/$language->language_id")}}/edit" method="get">
                <button type="submit" class="btn btn-link">Edit</button>
            </form>
        </td>
        <td><form action="{{url("/language/$language->language_id")}}" method="post">
                <input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}" /><button type="submit" class="btn btn-link">Delete</button>
            </form>
        </td>
                    <td>
                <form action="{{url("/language/related/$language->language_id")}}" method="get">
                    <button type="submit" class="btn btn-link">Film</button>
                </form>
            </td>
                    </tr>
        @empty
            <tr>
                <td>No language.</td>
            </tr>
        @endforelse
    </tbody>
</table>
{!!$languages->links()!!}@endsection