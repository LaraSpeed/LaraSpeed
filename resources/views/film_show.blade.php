@extends('master')
@section('content')
<h1 class="text-danger">List of Films</h1>

<div class="row">

    <div class="col-md-8 col-sm-8">
<form action="{{url("/film/search")}}" method="get">

    <div class="col-md-2 col-sm-2">
    </div>

    <div class="col-md-9 col-sm-9">
        <div class="input-group input-search">
            <input  type="text" class="form-control" name="keyword" placeholder="{{session('keyword', 'Keyword')}}"/>
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </div>


</form>
    </div>

    <div class="col-md-2 col-sm-2">
        <form action="{{url("/film")}}" method="get">
            <button type="submit" class="btn btn-danger">Clear Search</button>
        </form>
    </div>
</div>
<br/>

<div class="row">
    <div class="col-md-2 col-sm-2">
        <form action="{{url("/film/create")}}" method="get">
            <button type="submit" class="btn btn-primary">Add new Film</button>
        </form>
    </div>
</div>
<br/>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
        </div>

        <h2 class="panel-title">Films</h2>
    </header>
    <div class="panel-body">

<table class="table table-bordered table-striped mb-none" id="datatable-default">
    <thead>
        <tr>
                             <th class="c_string">
                <form action="{{url("/film/sort")}}" method="get">
                    <input type="hidden" name="title"/>
                <button class="btn btn-link" type="submit"><p @if(session('title', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Title @if(session('title', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('title', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></button>
                </form>
            </th>              <th class="c_text">
                <form action="{{url("/film/sort")}}" method="get">
                    <input type="hidden" name="description"/>
                <button class="btn btn-link" type="submit"><p @if(session('description', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Description @if(session('description', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('description', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></button>
                </form>
            </th>              <th class="c_numeric">
                <form action="{{url("/film/sort")}}" method="get">
                    <input type="hidden" name="release_year"/>
                <button class="btn btn-link" type="submit"><p @if(session('release_year', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Release year @if(session('release_year', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('release_year', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></button>
                </form>
            </th>                <th class="c_numeric">
                <form action="{{url("/film/sort")}}" method="get">
                    <input type="hidden" name="rental_duration"/>
                <button class="btn btn-link" type="submit"><p @if(session('rental_duration', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Rental duration @if(session('rental_duration', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('rental_duration', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></button>
                </form>
            </th>              <th class="c_numeric">
                <form action="{{url("/film/sort")}}" method="get">
                    <input type="hidden" name="rental_rate"/>
                <button class="btn btn-link" type="submit"><p @if(session('rental_rate', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Rental rate @if(session('rental_rate', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('rental_rate', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></button>
                </form>
            </th>              <th class="c_numeric">
                <form action="{{url("/film/sort")}}" method="get">
                    <input type="hidden" name="length"/>
                <button class="btn btn-link" type="submit"><p @if(session('length', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Length @if(session('length', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('length', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></button>
                </form>
            </th>              <th class="c_numeric">
                <form action="{{url("/film/sort")}}" method="get">
                    <input type="hidden" name="replacement_cost"/>
                <button class="btn btn-link" type="submit"><p @if(session('replacement_cost', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Replacement cost @if(session('replacement_cost', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('replacement_cost', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></button>
                </form>
            </th>       
        </tr>
    </thead>

    <tbody>
        @forelse($films as $film)
            <tr>
                 <td class="c_string">{{$film->title}}</td>
              <td class="c_text">{{$film->description}}</td>
              <td class="c_numeric">{{$film->release_year}}</td>
                <td class="c_numeric">{{$film->rental_duration}}</td>
              <td class="c_numeric">{{$film->rental_rate}}</td>
              <td class="c_numeric">{{$film->length}}</td>
              <td class="c_numeric">{{$film->replacement_cost}}</td>
                   <td class="defaut"><form action="{{url("/film/$film->film_id")}}" method="get">
                <button type="submit" class="btn btn-link"><i class="fa fa-arrows-alt"></i></button>
            </form>
        </td>
        <td class="defaut"><form action="{{url("/film/$film->film_id")}}/edit" method="get">
                <button type="submit" class="btn btn-link"><i class="fa fa-edit"></i></button>
            </form>
        </td>
        <td class="defaut">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <button type="submit" class="btn btn-link" ng-click="showModal('Delete', 'Do you really want to delete {{ $film->title}} ?', '{{url("/film/$film->film_id")}}')"><i class="fa fa-trash-o"></i></button>
        </td>
                    <td class="defaut">
                <form action="{{url("/film/related/$film->film_id")}}" method="get">
                    <input type="hidden" name="tab" value="language" />
                    <button type="submit" class="btn btn-link">Language</button>
                </form>
            </td>
                    <td class="defaut">
                <form action="{{url("/film/related/$film->film_id")}}" method="get">
                    <input type="hidden" name="tab" value="category" />
                    <button type="submit" class="btn btn-link">Category</button>
                </form>
            </td>
                    </tr>
        @empty
            <tr>
                <td colspan="13"><label class="text-danger">No film matching keyword {{session('keyword', 'Keyword')}}.</label></td>
            </tr>
        @endforelse
    </tbody>
</table><!--End Table-->

        <div class="row datatables-footer">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                {!!$films->links()!!}
            </div>
        </div>
    </div>
</section>@endsection