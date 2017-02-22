@extends('master')
@section('content')
@if(isset($address->customer) && "customer" == $table)
            <div class="row">
        <div class="col-md-4">
            <h1 class="text-danger">List of Customers</h1>
        </div>

        <div class="col-md-5">
            {{ session(['defaultSelect' => $address->address_id]) }}
            <h4 class="text-danger"><b>Address : {{$address->address}}</b></h4>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 col-sm-8">
            <form action="{{url("/address/search")}}" method="get">
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
            <form action="{{url("/customer/create")}}" method="get">
                <button type="submit" class="btn btn-primary">Add new Customer</button>
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

            <h2 class="panel-title">Customers</h2>
        </header>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                                                     <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap>
                              First name
                            </th>                          <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap>
                              Last name
                            </th>                          <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap>
                              Email
                            </th>                              <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap>
                              Create date
                            </th>                                                              <th class="text-md text-primary">
                                Store
                            </th>
                          
                            <th class="text-md text-primary" nowrap>Actions</th>

                                                             <th class="text-md text-primary">
                                    Payment
                                </th>
                                                              <th class="text-md text-primary">
                                    Rental
                                </th>
                                  
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($address->customer as  $customer)
                            <tr>
                                                             <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$customer->first_name}} </td>
                                                              <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$customer->last_name}} </td>
                                                              <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$customer->email}} </td>
                                                                  <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$customer->create_date}} </td>
                                   
                                                                           <td class="text-md">
                                        @if($customer->store)
                                            {{$customer->store->address->address}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                  
                                <td nowrap>
                                    <a href="{{url("/customer/$customer->customer_id")}}" data-toggle="tooltip" data-placement="top" title="Display"><button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button></a>
                                    <a href="{{url("/customer/$customer->customer_id")}}/edit" data-toggle="tooltip" data-placement="top" title="Edit"><button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button></a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $customer->first_name}} ?', '{{url("/customer/$customer->customer_id")}}')" data-toggle="tooltip" data-placement="top" title="Delete"><button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button></a>
                                </td>

                                                                 <td class="text-md">
                                    <form action="{{url("/customer/related/$customer->customer_id")}}" method="get">
                                        <input type="hidden" name="tab" value="payment" />
                                        <button type="submit" class="btn btn-link">Payment</button>
                                    </form>
                                </td>
                                                              <td class="text-md">
                                    <form action="{{url("/customer/related/$customer->customer_id")}}" method="get">
                                        <input type="hidden" name="tab" value="rental" />
                                        <button type="submit" class="btn btn-link">Rental</button>
                                    </form>
                                </td>
                                                              </tr>
                        @empty
                            <tr>
                                <td colspan="9"><label class="text-danger text-md">No customer matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>        @else

        @endif
        @if(isset($address->staff) && "staff" == $table)
            <div class="row">
        <div class="col-md-4">
            <h1 class="text-danger">List of Staffs</h1>
        </div>

        <div class="col-md-5">
            {{ session(['defaultSelect' => $address->address_id]) }}
            <h4 class="text-danger"><b>Address : {{$address->address}}</b></h4>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 col-sm-8">
            <form action="{{url("/address/search")}}" method="get">
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
            <form action="{{url("/staff/create")}}" method="get">
                <button type="submit" class="btn btn-primary">Add new Staff</button>
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

            <h2 class="panel-title">Staffs</h2>
        </header>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                                                   <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap>
                              First name
                            </th>                          <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap>
                              Last name
                            </th>                            <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap>
                              Email
                            </th>                              <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap>
                              Username
                            </th>                                                                <th class="text-md text-primary">
                                Store
                            </th>
                          
                            <th class="text-md text-primary" nowrap>Actions</th>

                                                             <th class="text-md text-primary">
                                    Rental
                                </th>
                                                              <th class="text-md text-primary">
                                    Payment
                                </th>
                                  
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($address->staff as  $staff)
                            <tr>
                                                           <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$staff->first_name}} </td>
                                                              <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$staff->last_name}} </td>
                                                                <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$staff->email}} </td>
                                                                  <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$staff->username}} </td>
                                     
                                                                           <td class="text-md">
                                        @if($staff->store)
                                            {{$staff->store->address->address}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                  
                                <td nowrap>
                                    <a href="{{url("/staff/$staff->staff_id")}}" data-toggle="tooltip" data-placement="top" title="Display"><button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button></a>
                                    <a href="{{url("/staff/$staff->staff_id")}}/edit" data-toggle="tooltip" data-placement="top" title="Edit"><button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button></a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $staff->first_name}} ?', '{{url("/staff/$staff->staff_id")}}')" data-toggle="tooltip" data-placement="top" title="Delete"><button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button></a>
                                </td>

                                                                 <td class="text-md">
                                    <form action="{{url("/staff/related/$staff->staff_id")}}" method="get">
                                        <input type="hidden" name="tab" value="rental" />
                                        <button type="submit" class="btn btn-link">Rental</button>
                                    </form>
                                </td>
                                                              <td class="text-md">
                                    <form action="{{url("/staff/related/$staff->staff_id")}}" method="get">
                                        <input type="hidden" name="tab" value="payment" />
                                        <button type="submit" class="btn btn-link">Payment</button>
                                    </form>
                                </td>
                                                              </tr>
                        @empty
                            <tr>
                                <td colspan="10"><label class="text-danger text-md">No staff matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>        @else

        @endif
        @if(isset($address->store) && "store" == $table)
            <div class="row">
        <div class="col-md-4">
            <h1 class="text-danger">List of Stores</h1>
        </div>

        <div class="col-md-5">
            {{ session(['defaultSelect' => $address->address_id]) }}
            <h4 class="text-danger"><b>Address : {{$address->address}}</b></h4>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 col-sm-8">
            <form action="{{url("/address/search")}}" method="get">
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
            <form action="{{url("/store/create")}}" method="get">
                <button type="submit" class="btn btn-primary">Add new Store</button>
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

            <h2 class="panel-title">Stores</h2>
        </header>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                                                               
                            <th class="text-md text-primary" nowrap>Actions</th>

                                                               <th class="text-md text-primary">
                                    Staff
                                </th>
                                                                <th class="text-md text-primary">
                                    Customer
                                </th>
                              
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($address->store as  $store)
                            <tr>
                                  
                                         
                                <td nowrap>
                                    <a href="{{url("/store/$store->store_id")}}" data-toggle="tooltip" data-placement="top" title="Display"><button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button></a>
                                    <a href="{{url("/store/$store->store_id")}}/edit" data-toggle="tooltip" data-placement="top" title="Edit"><button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button></a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $store->address->address}} ?', '{{url("/store/$store->store_id")}}')" data-toggle="tooltip" data-placement="top" title="Delete"><button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button></a>
                                </td>

                                                                   <td class="text-md">
                                    <form action="{{url("/store/related/$store->store_id")}}" method="get">
                                        <input type="hidden" name="tab" value="staff" />
                                        <button type="submit" class="btn btn-link">Staff</button>
                                    </form>
                                </td>
                                                                <td class="text-md">
                                    <form action="{{url("/store/related/$store->store_id")}}" method="get">
                                        <input type="hidden" name="tab" value="customer" />
                                        <button type="submit" class="btn btn-link">Customer</button>
                                    </form>
                                </td>
                                                          </tr>
                        @empty
                            <tr>
                                <td colspan="3"><label class="text-danger text-md">No store matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>        @else

        @endif
        @if(isset($address->city) && "city" == $table)
            <h3 class="text-danger">City : </h3>
     {{$address->city->city}}
           @else

        @endif
 @endsection