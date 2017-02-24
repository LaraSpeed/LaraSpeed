@extends('master')
@section('content')
<h1 class="text-danger">List of Cities</h1>

    <div class="row">

        <div class="col-md-12 col-sm-12">

            <form action="{{url("/city/search")}}" method="get">
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
                    <button type="submit" formmethod="get" formaction="{{url("/city")}}" class="btn btn-danger">Clear Search</button>
                </div>
            </form>
        </div>
    </div>
    <br/>

    <div class="row">
        <div class="col-md-2 col-sm-2">
            <form action="{{url("/city/create")}}" method="get">
                <button type="submit" class="btn btn-primary">Add new City</button>
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
            <h2 class="panel-title">Cities</h2>
        </header>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                                                       <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                City
                            </th>     
                                                                <th class="text-md text-primary">
                                   Country
                                </th>
                              
                                                            <th class="text-md text-primary">
                                    Address
                                </th>
                               
                            <th class="text-md text-primary">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($citys as $city)
                            <tr>
                                                               <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$city->city}} </td>
                                 
                                                                       <td class="text-md">
                                        @if($city->country)
                                            {{$city->country->country}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                  
                                                                <td class="text-md">
                                    <form action="{{url("/city/related/$city->city_id")}}" method="get">
                                        <input type="hidden" name="tab" value="address" />
                                        <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Addresses in the city">Addresses</button>
                                    </form>
                                </td>
                               
                                <td nowrap>
                                    <a href="{{url("/city/$city->city_id")}}" data-toggle="tooltip" data-placement="top" title="Display">
                                        <button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button>
                                    </a>
                                    <a href="{{url("/city/$city->city_id")}}/edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button>
                                    </a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $city->city}} ?', '{{url("/city/$city->city_id")}}')" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button>
                                    </a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><label class="text-danger text-md">No city matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table><!--End Table-->
                <div class="col-md-12">
                    {!!$citys->links()!!}
                </div>
            </div>
        </div>
    </section>@endsection