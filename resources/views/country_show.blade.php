@extends('master')
@section('content')
<h1 class="text-danger">List of Countries</h1>

    <div class="row">

        <div class="col-md-12 col-sm-12">

            <form action="{{url("/country/search")}}" method="get">
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
                    <button type="submit" formmethod="get" formaction="{{url("/country")}}" class="btn btn-danger">Clear Search</button>
                </div>
            </form>
        </div>
    </div>
    <br/>

    <div class="row">
        <div class="col-md-2 col-sm-2">
            <form action="{{url("/country/create")}}" method="get">
                <button type="submit" class="btn btn-primary">Add new Country</button>
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
            <h2 class="panel-title">Countries</h2>
        </header>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                                                       <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Country
                            </th>   
                                  
                                                            <th class="text-md text-primary">
                                    City
                                </th>
                                                             <th class="text-md text-primary">
                                    Address
                                </th>
                              
                            <th class="text-md text-primary">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($countrys as $country)
                            <tr>
                                                               <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$country->country}} </td>
                               
                                     
                                                                <td class="text-md">
                                    <form action="{{url("/country/related/$country->country_id")}}" method="get">
                                        <input type="hidden" name="tab" value="city" />
                                        <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Cities in the Country">Cities</button>
                                    </form>
                                </td>
                                                             <td class="text-md">
                                    <form action="{{url("/country/related/$country->country_id")}}" method="get">
                                        <input type="hidden" name="tab" value="address" />
                                        <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Country&#039;s Address">Addresses</button>
                                    </form>
                                </td>
                              
                                <td nowrap>
                                    <a href="{{url("/country/$country->country_id")}}" data-toggle="tooltip" data-placement="top" title="Display">
                                        <button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button>
                                    </a>
                                    <a href="{{url("/country/$country->country_id")}}/edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button>
                                    </a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $country->country}} ?', '{{url("/country/$country->country_id")}}')" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button>
                                    </a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="3"><label class="text-danger text-md">No country matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table><!--End Table-->
                <div class="col-md-12">
                    {!!$countrys->links()!!}
                </div>
            </div>
        </div>
    </section>@endsection