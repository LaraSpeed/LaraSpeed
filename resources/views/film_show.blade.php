@extends('master')
@section('content')
<h1 class="text-danger">List of Films</h1>

    <div class="row">

        <div class="col-md-12 col-sm-12">

            <form action="{{url("/film/search")}}" method="get">
                <div class="col-md-1 col-sm-1">
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="input-group input-search">
                        <input  type="text" class="form-control" name="keyword" placeholder="{{session('keyword', 'Keyword')}}"/>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>

                <div class="col-md-1">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>

                <div class="col-md-2">
                    <button type="submit" formmethod="get" formaction="{{url("/film")}}" class="btn btn-danger">Clear Search</button>
                </div>
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
                <table class="table table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                                                         <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Title
                            </th>                              <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Description
                            </th>                              <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Release Year
                            </th>                                <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Rental duration
                            </th>                              <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Rental Rate
                            </th>                              <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Length
                            </th>         
                                                              <th class="text-md text-primary">
                                   Languages
                                </th>
                                    
                                 
                            <th class="text-md text-primary">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($films as $film)
                            <tr>
                                                                 <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$film->title}} </td>
                                                              <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$film->description}} </td>
                                                              <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$film->release_year}} </td>
                                                                <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$film->rental_duration}} days</td>
                                                              <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$film->rental_rate}} $</td>
                                                              <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$film->length}} minutes</td>
                                     
                                                                     <td class="text-md">
                                        @if($film->language)
                                            {{$film->language->name}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                        
                                     
                                <td nowrap>
                                    <a href="{{url("/film/$film->film_id")}}" data-toggle="tooltip" data-placement="top" title="Display">
                                        <button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button>
                                    </a>
                                    <a href="{{url("/film/$film->film_id")}}/edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button>
                                    </a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $film->title}} ?', '{{url("/film/$film->film_id")}}')" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button>
                                    </a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="13"><label class="text-danger text-md">No film matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table><!--End Table-->
                <div class="col-md-12">
                    {!!$films->links()!!}
                </div>
            </div>
        </div>
    </section>@endsection