@extends('master')
@section('content')
<h1 class="text-danger">List of Languages</h1>

<div class="row">
    <div class="col-md-2 col-sm-2">
        <form action="{{url("/language")}}" method="get">
            <button type="submit" class="btn btn-primary">Clear Search</button>
        </form>
    </div>

    <div class="col-md-8 col-sm-8">
<form action="{{url("/language/search")}}" method="get">

    <div class="col-md-10 col-sm-10">
        <input  type="text" class="form-control" name="keyword" placeholder="{{session('keyword', 'Keyword')}}"/>
    </div>

    <div class="col-md-2 col-sm-2">
        <input type="submit" class="btn btn-primary" value="Search"/>
    </div>

</form>
    </div>
</div>
<br/>

<div class="row">
    <div class="col-md-2 col-sm-2">
        <form action="{{url("/language/create")}}" method="get">
            <button type="submit" class="btn btn-primary">Add new Language</button>
        </form>
    </div>
</div>
<br/>

<table class="table table-striped">
    <thead>
        <tr>
                           <th>
                <a href="{{url("/language/sort?name")}}">Name</a> <img src="{{ URL::asset(session('name.png', 'none.png')) }}" />
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
        <td>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <button type="submit" class="btn btn-link" ng-click="showModal('Delete', 'Do you really want to delete this language', '{{url("/language/$language->language_id")}}')">Delete</button>
        </td>
                    <td>
                <form action="{{url("/language/related/$language->language_id")}}" method="get">
                    <button type="submit" class="btn btn-link">Film</button>
                </form>
            </td>
                    </tr>
        @empty
            <tr>
                <td>No language matching keyword {{session('keyword', 'Keyword')}}.</td>
            </tr>
        @endforelse
    </tbody>
</table>
{!!$languages->links()!!}@endsection