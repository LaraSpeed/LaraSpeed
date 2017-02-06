@extends('master')
@section('content')
<h1 class="text-danger">List of Directors</h1>

    <div class="row">

        <div class="col-md-8 col-sm-8">

            <form action="{{url("/director/search")}}" method="get">
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
            <form action="{{url("/director")}}" method="get">
                <button type="submit" class="btn btn-danger">Clear Search</button>
            </form>
        </div>
    </div>
    <br/>

    <div class="row">
        <div class="col-md-2 col-sm-2">
            <form action="{{url("/director/create")}}" method="get">
                <button type="submit" class="btn btn-primary">Add new Director</button>
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
            <h2 class="panel-title">Directors</h2>
        </header>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table mb-none">
                    <thead>
                        <tr>
                                                       <!--class="{$attrType->formClass("table")}}"-->
                            <th class="center" nowrap> <!-- -->
                                <a @if(session('name', 'none') == 'asc') href="{{url("/director/sort?name=1&asc")}}" @else href="{{url("/director/sort?name=1&desc")}}" @endif><p @if(session('name', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Name @if(session('name', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('name', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></a>
                            </th>                              <!--class="{$attrType->formClass("table")}}"-->
                            <th class="center" nowrap> <!-- -->
                                <a @if(session('birth', 'none') == 'asc') href="{{url("/director/sort?birth=1&asc")}}" @else href="{{url("/director/sort?birth=1&desc")}}" @endif><p @if(session('birth', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Birth @if(session('birth', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('birth', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></a>
                            </th>                              <!--class="{$attrType->formClass("table")}}"-->
                            <th class="center" nowrap> <!-- -->
                                <a @if(session('bio', 'none') == 'asc') href="{{url("/director/sort?bio=1&asc")}}" @else href="{{url("/director/sort?bio=1&desc")}}" @endif><p @if(session('bio', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Bio @if(session('bio', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('bio', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></a>
                            </th> 
                                
                            <th class="center"><a href=""><p>Actions</p></a></th>
                                                        <th class="center"><a href=""><p>Relations</p></a></th>
                                                    </tr>
                    </thead>

                    <tbody>
                        @forelse($directors as $director)
                            <tr>
                                                               <!--class="{$attrType->formClass("table")}}"-->
                                <td class="center">{{$director->name}}</td>
                                                              <!--class="{$attrType->formClass("table")}}"-->
                                <td class="center">{{$director->birth}}</td>
                                                              <!--class="{$attrType->formClass("table")}}"-->
                                <td class="center">{{$director->bio}}</td>
                             
                                   
                                <td class="center">
                                    <a href="{{url("/director/$director->id")}}"><i class="fa fa-arrows-alt"></i></a>
                                    <a href="{{url("/director/$director->id")}}/edit"><i class="fa fa-edit"></i></a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $director->name}} ?', '{{url("/director/$director->id")}}')"><i class="fa fa-trash-o"></i></a>
                                </td>

                                                                <td class="center">
                                    <form action="{{url("/director/related/$director->id")}}" method="get">
                                        <input type="hidden" name="tab" value="film" />
                                        <button type="submit" class="btn btn-link">Film</button>
                                    </form>
                                </td>
                                                          </tr>
                        @empty
                            <tr>
                                <td colspan="4"><label class="text-danger">No director matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table><!--End Table-->
            </div>

            <div class="row datatables-footer">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    {!!$directors->links()!!}
                </div>
            </div>
        </div>
    </section>@endsection