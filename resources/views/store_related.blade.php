@extends('master')
@section('content')
@if(isset($store->address) && "address" == $table)
            <h3 class="text-danger">Address : </h3>
     {{$store->address->address}}
     {{$store->address->address2}}
     {{$store->address->district}}
      {{$store->address->postal_code}}
     {{$store->address->phone}}
          @else

        @endif
        @if(isset($store->staff) && "staff" == $table)
            <div class="row">
        <div class="col-md-4">
            <h1 class="text-danger">List of Staffs</h1>
        </div>

        <div class="col-md-5">
            {{ session(['defaultSelect' => $store->store_id]) }}
            <h4 class="text-danger"><b>Store : {{$store->address->address}}</b></h4>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 col-sm-8">
            <form action="{{url("/store/search")}}" method="get">
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
                            </th>                                                              <th class="text-md text-primary">
                                Address
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
                        @forelse($store->staff as  $staff)
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
                                        @if($staff->address)
                                            {{$staff->address->address}}
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
        @if(isset($store->film) && "film" == $table)
            <div class="row">
        <div class="col-md-4">
            <h1 class="text-danger">List of Films</h1>
        </div>

        <div class="col-md-5">
            {{ session(['defaultSelect' => $store->store_id]) }}
            <h4 class="text-danger"><b>Store : {{$store->address->address}}</b></h4>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 col-sm-8">
            <form action="{{url("/store/search")}}" method="get">
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
                            <th class="text-md text-primary" nowrap>
                              Title
                            </th>                          <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap>
                              Description
                            </th>                          <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap>
                              Release year
                            </th>                              <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap>
                              Rental rate
                            </th>                          <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap>
                              Length
                            </th>                                                              <th class="text-md text-primary">
                                Language
                            </th>
                                
                            <th class="text-md text-primary" nowrap>Actions</th>

                                     
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($store->film as  $film)
                            <tr>
                                                             <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$film->title}} </td>
                                                              <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$film->description}} </td>
                                                              <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$film->release_year}} </td>
                                                                  <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$film->rental_rate}} $</td>
                                                              <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$film->length}} minutes</td>
                                         
                                                                     <td class="text-md">
                                        @if($film->language)
                                            {{$film->language->name}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                        
                                <td nowrap>
                                    <a href="{{url("/film/$film->film_id")}}" data-toggle="tooltip" data-placement="top" title="Display"><button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button></a>
                                    <a href="{{url("/film/$film->film_id")}}/edit" data-toggle="tooltip" data-placement="top" title="Edit"><button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button></a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $film->title}} ?', '{{url("/film/$film->film_id")}}')" data-toggle="tooltip" data-placement="top" title="Delete"><button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button></a>
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
        </div>
    </section>        @else

        @endif
        @if(isset($store->customer) && "customer" == $table)
            <div class="row">
        <div class="col-md-4">
            <h1 class="text-danger">List of Customers</h1>
        </div>

        <div class="col-md-5">
            {{ session(['defaultSelect' => $store->store_id]) }}
            <h4 class="text-danger"><b>Store : {{$store->address->address}}</b></h4>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 col-sm-8">
            <form action="{{url("/store/search")}}" method="get">
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
                            </th>                                                            <th class="text-md text-primary">
                                Address
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
                        @forelse($store->customer as  $customer)
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
                                        @if($customer->address)
                                            {{$customer->address->address}}
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
 @endsection