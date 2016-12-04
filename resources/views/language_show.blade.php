@extends('master')
@section('content')
<h1 class="text-danger">List of Languages</h1>

<div class="row">

    <div class="col-md-8 col-sm-8">
<form action="{{url("/language/search")}}" method="get">

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
        <form action="{{url("/language")}}" method="get">
            <button type="submit" class="btn btn-danger">Clear Search</button>
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

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
        </div>

        <h2 class="panel-title">Languages</h2>
    </header>
    <div class="panel-body">

<table class="table table-bordered table-striped mb-none" id="datatable-default">
    <thead>
        <tr>
                           <th class="c_string">
                <form action="{{url("/language/sort")}}" method="get">
                    <input type="hidden" name="name"/>
                <button class="btn btn-link" type="submit"><p @if(session('name', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Name @if(session('name', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('name', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></button>
                </form>
            </th>   
        </tr>
    </thead>

    <tbody>
        @forelse($languages as $language)
            <tr>
               <td class="c_string">{{$language->name}}</td>
               <td class="defaut"><form action="{{url("/language/$language->language_id")}}" method="get">
                <button type="submit" class="btn btn-link"><i class="fa fa-arrows-alt"></i></button>
            </form>
        </td>
        <td class="defaut"><form action="{{url("/language/$language->language_id")}}/edit" method="get">
                <button type="submit" class="btn btn-link"><i class="fa fa-edit"></i></button>
            </form>
        </td>
        <td class="defaut">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <button type="submit" class="btn btn-link" ng-click="showModal('Delete', 'Do you really want to delete {{ $language->name}} ?', '{{url("/language/$language->language_id")}}')"><i class="fa fa-trash-o"></i></button>
        </td>
                    <td class="defaut">
                <form action="{{url("/language/related/$language->language_id")}}" method="get">
                    <input type="hidden" name="tab" value="film" />
                    <button type="submit" class="btn btn-link">Film</button>
                </form>
            </td>
                    </tr>
        @empty
            <tr>
                <td colspan="3"><label class="text-danger">No language matching keyword {{session('keyword', 'Keyword')}}.</label></td>
            </tr>
        @endforelse
    </tbody>
</table><!--End Table-->

        <div class="row datatables-footer">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                {!!$languages->links()!!}
            </div>
        </div>
    </div>
</section>@endsection