@extends('master')
@section('content')
<h1 class="text-danger">List of Categorys</h1>

    <div class="row">

        <div class="col-md-8 col-sm-8">

            <form action="{{url("/category/search")}}" method="get">
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
            <form action="{{url("/category")}}" method="get">
                <button type="submit" class="btn btn-danger">Clear Search</button>
            </form>
        </div>
    </div>
    <br/>

    <div class="row">
        <div class="col-md-2 col-sm-2">
            <form action="{{url("/category/create")}}" method="get">
                <button type="submit" class="btn btn-primary">Add new Category</button>
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
            <h2 class="panel-title">Categorys</h2>
        </header>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table mb-none">
                    <thead>
                        <tr>
                                                       <!--class="{$attrType->formClass("table")}}"-->
                            <th class="center" nowrap> <!-- -->
                                <a @if(session('name', 'none') == 'asc') href="{{url("/category/sort?name=1&asc")}}" @else href="{{url("/category/sort?name=1&desc")}}" @endif><p @if(session('name', 'keyword') != "keyword") ng-style = "{ 'font-weight': 'bold', 'text-decoration' : 'underline' }" @endif >Name @if(session('name', 'none') == 'asc') <span class="text-dark"><i class="fa fa-arrow-up"></i></span> @elseif(session('name', 'none') == 'desc') <span class="text-dark"><i class="fa fa-arrow-down"></i></span> @else <span class="text-dark"><i class="fa fa-arrows-v"></i></span> @endif</p></a>
                            </th>   
                                
                            <th class="center"><a href=""><p>Actions</p></a></th>
                                                        <th class="center"><a href=""><p>Relations</p></a></th>
                                                    </tr>
                    </thead>

                    <tbody>
                        @forelse($categorys as $category)
                            <tr>
                                                               <!--class="{$attrType->formClass("table")}}"-->
                                <td class="center">{{$category->name}}</td>
                               
                                   
                                <td class="center">
                                    <a href="{{url("/category/$category->category_id")}}"><i class="fa fa-arrows-alt"></i></a>
                                    <a href="{{url("/category/$category->category_id")}}/edit"><i class="fa fa-edit"></i></a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $category->name}} ?', '{{url("/category/$category->category_id")}}')"><i class="fa fa-trash-o"></i></a>
                                </td>

                                                                <td class="center">
                                    <form action="{{url("/category/related/$category->category_id")}}" method="get">
                                        <input type="hidden" name="tab" value="film" />
                                        <button type="submit" class="btn btn-link">Film</button>
                                    </form>
                                </td>
                                                          </tr>
                        @empty
                            <tr>
                                <td colspan="3"><label class="text-danger">No category matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table><!--End Table-->
            </div>

            <div class="row datatables-footer">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    {!!$categorys->links()!!}
                </div>
            </div>
        </div>
    </section>@endsection