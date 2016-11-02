@extends('master')
@section('content')
<h1 class="text-danger">List of Deliverys</h1>

<div class="row">

    <div class="col-md-8 col-sm-8">
<form action="{{url("/delivery/search")}}" method="get">

    <div class="col-md-2 col-sm-2">
        <input type="submit" class="btn btn-primary" value="Search"/>
    </div>

    <div class="col-md-10 col-sm-10">
        <input  type="text" class="form-control" name="keyword" placeholder="{{session('keyword', 'Keyword')}}"/>
    </div>


</form>
    </div>

    <div class="col-md-1 col-sm-1">
        <form action="{{url("/delivery")}}" method="get">
            <button type="submit" class="btn btn-primary">Clear Search</button>
        </form>
    </div>
</div>
<br/>

<div class="row">
    <div class="col-md-2 col-sm-2">
        <form action="{{url("/delivery/create")}}" method="get">
            <button type="submit" class="btn btn-primary">Add new Delivery</button>
        </form>
    </div>
</div>
<br/>

<table class="table table-striped">
    <thead>
        <tr>
                           <th class="c_string">
                <form action="{{url("/delivery/sort")}}" method="get">
                    <input type="hidden" name="identifiant"/>
                <button class="btn btn-link" type="submit"><p @if(session('identifiant', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Identifiant <img src="{{ URL::asset(session('identifiant', 'none').'.png') }}" /></p></button>
                </form>
            </th>              <th class="c_date">
                <form action="{{url("/delivery/sort")}}" method="get">
                    <input type="hidden" name="date"/>
                <button class="btn btn-link" type="submit"><p @if(session('date', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Date <img src="{{ URL::asset(session('date', 'none').'.png') }}" /></p></button>
                </form>
            </th>              <th class="c_text">
                <form action="{{url("/delivery/sort")}}" method="get">
                    <input type="hidden" name="articles"/>
                <button class="btn btn-link" type="submit"><p @if(session('articles', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Articles <img src="{{ URL::asset(session('articles', 'none').'.png') }}" /></p></button>
                </form>
            </th> 
        </tr>
    </thead>

    <tbody>
        @forelse($deliverys as $delivery)
            <tr>
               <td class="c_string">{{$delivery->identifiant}}</td>
              <td class="c_date">{{$delivery->date}}</td>
              <td class="c_text">{{$delivery->articles}}</td>
             <td class="defaut"><form action="{{url("/delivery/$delivery->id")}}" method="get">
                <button type="submit" class="btn btn-link">View</button>
            </form>
        </td>
        <td class="defaut"><form action="{{url("/delivery/$delivery->id")}}/edit" method="get">
                <button type="submit" class="btn btn-link">Edit</button>
            </form>
        </td>
        <td class="defaut">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <button type="submit" class="btn btn-link" ng-click="showModal('Delete', 'Do you really want to delete {{ $delivery->identifiant}} ?', '{{url("/delivery/$delivery->id")}}')">Delete</button>
        </td>
                    <td class="defaut">
                <form action="{{url("/delivery/related/$delivery->id")}}" method="get">
                    <button type="submit" class="btn btn-link">Film</button>
                </form>
            </td>
                    </tr>
        @empty
            <tr>
                <td colspan="4"><label class="text-danger">No delivery matching keyword {{session('keyword', 'Keyword')}}.</label></td>
            </tr>
        @endforelse
    </tbody>
</table>
{!!$deliverys->links()!!}@endsection