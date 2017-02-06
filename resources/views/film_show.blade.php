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
            <div class="table-responsive">
                <table class="table mb-none">
                    <thead>
                        <tr>
                                                       <!--class="{$attrType->formClass("table")}}"-->
                            <th class="center" nowrap> <!-- -->
                                <a @if(session('title', 'none') == 'asc') href="{{url("/film/sort?title=1&asc")}}" @else href="{{url("/film/sort?title=1&desc")}}" @endif><p @if(session('title', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Title @if(session('title', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('title', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></a>
                            </th>                              <!--class="{$attrType->formClass("table")}}"-->
                            <th class="center" nowrap> <!-- -->
                                <a @if(session('description', 'none') == 'asc') href="{{url("/film/sort?description=1&asc")}}" @else href="{{url("/film/sort?description=1&desc")}}" @endif><p @if(session('description', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Description @if(session('description', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('description', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></a>
                            </th>                              <!--class="{$attrType->formClass("table")}}"-->
                            <th class="center" nowrap> <!-- -->
                                <a @if(session('price', 'none') == 'asc') href="{{url("/film/sort?price=1&asc")}}" @else href="{{url("/film/sort?price=1&desc")}}" @endif><p @if(session('price', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Price @if(session('price', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('price', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></a>
                            </th>                              <!--class="{$attrType->formClass("table")}}"-->
                            <th class="center" nowrap> <!-- -->
                                <a @if(session('famous', 'none') == 'asc') href="{{url("/film/sort?famous=1&asc")}}" @else href="{{url("/film/sort?famous=1&desc")}}" @endif><p @if(session('famous', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Famous @if(session('famous', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('famous', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></a>
                            </th> 
                                                              <th class="center">
                                    <a href=""><p>Director</p></a>
                                </th>
                              
                            <th class="center"><a href=""><p>Actions</p></a></th>
                                                        <th class="center"><a href=""><p>Relations</p></a></th>
                                                    </tr>
                    </thead>

                    <tbody>
                        @forelse($films as $film)
                            <tr>
                                                               <!--class="{$attrType->formClass("table")}}"-->
                                <td class="center">{{$film->title}}</td>
                                                              <!--class="{$attrType->formClass("table")}}"-->
                                <td class="center">{{$film->description}}</td>
                                                              <!--class="{$attrType->formClass("table")}}"-->
                                <td class="center">{{$film->price}}</td>
                                                              <!--class="{$attrType->formClass("table")}}"-->
                                <td class="center">{{$film->famous}}</td>
                             
                                                                     <td class="center">
                                        @if($film->director)
                                            {{$film->director->name}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                  
                                <td class="center">
                                    <a href="{{url("/film/$film->id")}}"><i class="fa fa-arrows-alt"></i></a>
                                    <a href="{{url("/film/$film->id")}}/edit"><i class="fa fa-edit"></i></a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $film->title}} ?', '{{url("/film/$film->id")}}')"><i class="fa fa-trash-o"></i></a>
                                </td>

                                                              </tr>
                        @empty
                            <tr>
                                <td colspan="5"><label class="text-danger">No film matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table><!--End Table-->
            </div>

            <div class="row datatables-footer">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    {!!$films->links()!!}
                </div>
            </div>
        </div>
    </section>@endsection