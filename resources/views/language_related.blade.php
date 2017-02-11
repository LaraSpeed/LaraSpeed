@extends('master')
@section('content')
@if(isset($language->film) && "film" == $table)
            <div class="row">
        <div class="col-md-4">
            <h1 class="text-danger">List of Films</h1>
        </div>

        <div class="col-md-5">
            {{ session(['defaultSelect' => $language->language_id]) }}
            <h4 class="text-danger"><b>Language : {{$language->name}}</b></h4>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 col-sm-8">
            <form action="{{url("/language/search")}}" method="get">
                <input type="hidden" name="tab" value="{{$table}}" />
                <div class="col-md-2 col-sm-2"></div>

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
            <form action="{{url(Request::url())}}" method="get">
                <input type="hidden" name="cs" />
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
                            <th class="center text-md" nowrap>
                                <a @if(session('title', 'none') == 'asc') href="{{url("/language/sort?title=1&tab=$table&asc")}}" @else href="{{url("/language/sort?title=1&tab=$table&desc")}}" @endif><p @if(session('title', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Title @if(session('title', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('title', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></a>
                            </th>                          <!--class="{$attrType->formClass("table")}}"-->
                            <th class="center text-md" nowrap>
                                <a @if(session('description', 'none') == 'asc') href="{{url("/language/sort?description=1&tab=$table&asc")}}" @else href="{{url("/language/sort?description=1&tab=$table&desc")}}" @endif><p @if(session('description', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Description @if(session('description', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('description', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></a>
                            </th>                          <!--class="{$attrType->formClass("table")}}"-->
                            <th class="center text-md" nowrap>
                                <a @if(session('release_year', 'none') == 'asc') href="{{url("/language/sort?release_year=1&tab=$table&asc")}}" @else href="{{url("/language/sort?release_year=1&tab=$table&desc")}}" @endif><p @if(session('release_year', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Release year @if(session('release_year', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('release_year', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></a>
                            </th>                            <!--class="{$attrType->formClass("table")}}"-->
                            <th class="center text-md" nowrap>
                                <a @if(session('rental_duration', 'none') == 'asc') href="{{url("/language/sort?rental_duration=1&tab=$table&asc")}}" @else href="{{url("/language/sort?rental_duration=1&tab=$table&desc")}}" @endif><p @if(session('rental_duration', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Rental duration @if(session('rental_duration', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('rental_duration', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></a>
                            </th>                          <!--class="{$attrType->formClass("table")}}"-->
                            <th class="center text-md" nowrap>
                                <a @if(session('rental_rate', 'none') == 'asc') href="{{url("/language/sort?rental_rate=1&tab=$table&asc")}}" @else href="{{url("/language/sort?rental_rate=1&tab=$table&desc")}}" @endif><p @if(session('rental_rate', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Rental rate @if(session('rental_rate', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('rental_rate', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></a>
                            </th>                          <!--class="{$attrType->formClass("table")}}"-->
                            <th class="center text-md" nowrap>
                                <a @if(session('length', 'none') == 'asc') href="{{url("/language/sort?length=1&tab=$table&asc")}}" @else href="{{url("/language/sort?length=1&tab=$table&desc")}}" @endif><p @if(session('length', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Length @if(session('length', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('length', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></a>
                            </th>                          <!--class="{$attrType->formClass("table")}}"-->
                            <th class="center text-md" nowrap>
                                <a @if(session('replacement_cost', 'none') == 'asc') href="{{url("/language/sort?replacement_cost=1&tab=$table&asc")}}" @else href="{{url("/language/sort?replacement_cost=1&tab=$table&desc")}}" @endif><p @if(session('replacement_cost', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Replacement cost @if(session('replacement_cost', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('replacement_cost', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></a>
                            </th>                                    
                            <th class="center text-md" nowrap><a href=""><p>Actions</p></a></th>
                                                               <th class="center text-md"><a href=""><p>Relations</p></a></th>
                                 
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($language->film_paginated as  $film)
                            <tr>
                                                             <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="center text-md">{{$film->title}}</td>
                                                              <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="center text-md">{{$film->description}}</td>
                                                              <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="center text-md">{{$film->release_year}}</td>
                                                                <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="center text-md">{{$film->rental_duration}}</td>
                                                              <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="center text-md">{{$film->rental_rate}}</td>
                                                              <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="center text-md">{{$film->length}}</td>
                                                              <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="center text-md">{{$film->replacement_cost}}</td>
                                       
                                     
                                <td class="center" nowrap>
                                    <a href="{{url("/film/$film->film_id")}}" data-toggle="tooltip" data-placement="top" title="Display"><button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button></a>
                                    <a href="{{url("/film/$film->film_id")}}/edit" data-toggle="tooltip" data-placement="top" title="Edit"><button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button></a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $film->title}} ?', '{{url("/film/$film->film_id")}}')" data-toggle="tooltip" data-placement="top" title="Delete"><button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button></a>
                                </td>

                                                                   <td class="center text-md">
                                    <form action="{{url("/film/related/$film->film_id")}}" method="get">
                                        <input type="hidden" name="tab" value="category" />
                                        <button type="submit" class="btn btn-link">Category</button>
                                    </form>
                                </td>
                                                          </tr>
                        @empty
                            <tr>
                                <td colspan="13"><label class="text-danger text-md">No film matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="row datatables-footer">
                <div class="col-md-4"></div>
                <div class="col-md-6">
                    {!!$language->film_paginated->links()!!}
                </div>
            </div>
        </div>
    </section>        @else

        @endif
 @endsection