@extends('master')
@section('content')
@if(isset($country->city) && "city" == $table)
            <div class="row">
        <div class="col-md-4">
            <h1 class="text-danger">List of Cities</h1>
        </div>

        <div class="col-md-5">
            {{ session(['defaultSelect' => $country->country_id]) }}
            <h4 class="text-danger"><b>Country : {{$country->country}}</b></h4>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 col-sm-8">
            <form action="{{url("/country/search")}}" method="get">
                <input type="hidden" name="tab" value="{{$table}}" />
                <div class="col-md-2 col-sm-2"></div>

                <div class="col-md-8 col-sm-8">
                    <div class="input-group input-search">
                        <input  type="text" class="form-control" name="keyword" placeholder="{{session('keyword', 'Keyword')}}"/>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-success">Search</button>
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
                            <th class="text-md text-primary" nowrap>
                              City
                            </th>                                  
                                                             <th class="text-md text-primary">
                                    Addresses
                                </th>
                                
                            <th class="text-md text-primary" nowrap>Actions</th>

                        </tr>
                    </thead>

                    <tbody>
                        @forelse($country->city_paginated as  $city)
                            <tr>
                                                           <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$city->city}} </td>
                                     
                                     

                                                                 <td class="text-md">
                                    <form action="{{url("/city/related/$city->city_id")}}" method="get">
                                        <input type="hidden" name="tab" value="address" />
                                        <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Addresses in the city">Addresses</button>
                                    </form>
                                </td>
                                
                                <td nowrap>
                                    <a href="{{url("/city/$city->city_id")}}" data-toggle="tooltip" data-placement="top" title="Display"><button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button></a>
                                    <a href="{{url("/city/$city->city_id")}}/edit" data-toggle="tooltip" data-placement="top" title="Edit"><button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button></a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $city->city}} ?', '{{url("/city/$city->city_id")}}')" data-toggle="tooltip" data-placement="top" title="Delete"><button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><label class="text-danger text-md">No city matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="col-md-12">
                    {!!$country->city_paginated->links()!!}
                </div>
            </div>
        </div>
    </section>        @else

        @endif
        @if(isset($country->address) && "address" == $table)
            <div class="row">
        <div class="col-md-4">
            <h1 class="text-danger">List of Addresses</h1>
        </div>

        <div class="col-md-5">
            {{ session(['defaultSelect' => $country->country_id]) }}
            <h4 class="text-danger"><b>Country : {{$country->country}}</b></h4>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 col-sm-8">
            <form action="{{url("/country/search")}}" method="get">
                <input type="hidden" name="tab" value="{{$table}}" />
                <div class="col-md-2 col-sm-2"></div>

                <div class="col-md-8 col-sm-8">
                    <div class="input-group input-search">
                        <input  type="text" class="form-control" name="keyword" placeholder="{{session('keyword', 'Keyword')}}"/>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-success">Search</button>
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
            <form action="{{url("/address/create")}}" method="get">
                <button type="submit" class="btn btn-primary">Add new Address</button>
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

            <h2 class="panel-title">Addresses</h2>
        </header>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                                                   <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap>
                              Address
                            </th>                          <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap>
                              Address 2
                            </th>                          <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap>
                              District
                            </th>                            <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap>
                              Postal Code
                            </th>                          <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap>
                              Phone
                            </th>                                                              <th class="text-md text-primary">
                                Cities
                            </th>
                          
                                                             <th class="text-md text-primary">
                                    Customers
                                </th>
                                                              <th class="text-md text-primary">
                                    Staffs
                                </th>
                                                              <th class="text-md text-primary">
                                    Stores
                                </th>
                                
                            <th class="text-md text-primary" nowrap>Actions</th>

                        </tr>
                    </thead>

                    <tbody>
                        @forelse($country->address_paginated as  $address)
                            <tr>
                                                           <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$address->address}} </td>
                                                              <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$address->address2}} </td>
                                                              <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$address->district}} </td>
                                                                <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$address->postal_code}} </td>
                                                              <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$address->phone}} </td>
                                   
                                                                           <td class="text-md">
                                        @if($address->city)
                                            {{$address->city->city}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                  

                                                                 <td class="text-md">
                                    <form action="{{url("/address/related/$address->address_id")}}" method="get">
                                        <input type="hidden" name="tab" value="customer" />
                                        <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Customers at the Address">Customers</button>
                                    </form>
                                </td>
                                                              <td class="text-md">
                                    <form action="{{url("/address/related/$address->address_id")}}" method="get">
                                        <input type="hidden" name="tab" value="staff" />
                                        <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Staffs at the Address">Staffs</button>
                                    </form>
                                </td>
                                                              <td class="text-md">
                                    <form action="{{url("/address/related/$address->address_id")}}" method="get">
                                        <input type="hidden" name="tab" value="store" />
                                        <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Stores at the Address">Stores</button>
                                    </form>
                                </td>
                                
                                <td nowrap>
                                    <a href="{{url("/address/$address->address_id")}}" data-toggle="tooltip" data-placement="top" title="Display"><button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button></a>
                                    <a href="{{url("/address/$address->address_id")}}/edit" data-toggle="tooltip" data-placement="top" title="Edit"><button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button></a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $address->address}} ?', '{{url("/address/$address->address_id")}}')" data-toggle="tooltip" data-placement="top" title="Delete"><button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8"><label class="text-danger text-md">No address matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="col-md-12">
                    {!!$country->address_paginated->links()!!}
                </div>
            </div>
        </div>
    </section>        @else

        @endif
 @endsection