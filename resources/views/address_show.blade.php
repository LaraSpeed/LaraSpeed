@extends('master')
@section('content')
<h1 class="text-danger">List of Addresses</h1>

    <div class="row">

        <div class="col-md-8 col-sm-8">

            <form action="{{url("/address/search")}}" method="get">
                <div class="col-md-2 col-sm-2">
                </div>
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
            <form action="{{url("/address")}}" method="get">
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
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Address
                            </th>                              <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Address2
                            </th>                              <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                District
                            </th>                                <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Postal code
                            </th>                              <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Phone
                            </th>   
                                                                  <th class="text-md text-primary">
                                   City
                                </th>
                              
                            <th class="text-md text-primary">Actions</th>

                                                            <th class="text-md text-primary">
                                    Customer
                                </th>
                                                             <th class="text-md text-primary">
                                    Staff
                                </th>
                                                       </tr>
                    </thead>

                    <tbody>
                        @forelse($addresss as $address)
                            <tr>
                                                               <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$address->address}}</td>
                                                              <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$address->address2}}</td>
                                                              <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$address->district}}</td>
                                                                <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$address->postal_code}}</td>
                                                              <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$address->phone}}</td>
                               
                                                                         <td class="text-md">
                                        @if($address->city)
                                            {{$address->city->city}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                  
                                <td nowrap>
                                    <a href="{{url("/address/$address->address_id")}}" data-toggle="tooltip" data-placement="top" title="Display">
                                        <button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button>
                                    </a>
                                    <a href="{{url("/address/$address->address_id")}}/edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button>
                                    </a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $address->address}} ?', '{{url("/address/$address->address_id")}}')" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button>
                                    </a>
                                </td>

                                                                <td class="text-md">
                                    <form action="{{url("/address/related/$address->address_id")}}" method="get">
                                        <input type="hidden" name="tab" value="customer" />
                                        <button type="submit" class="btn btn-link">Customer</button>
                                    </form>
                                </td>
                                                             <td class="text-md">
                                    <form action="{{url("/address/related/$address->address_id")}}" method="get">
                                        <input type="hidden" name="tab" value="staff" />
                                        <button type="submit" class="btn btn-link">Staff</button>
                                    </form>
                                </td>
                                                           </tr>
                        @empty
                            <tr>
                                <td colspan="8"><label class="text-danger text-md">No address matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table><!--End Table-->
                <div class="col-md-12">
                    {!!$addresss->links()!!}
                </div>
            </div>
        </div>
    </section>@endsection