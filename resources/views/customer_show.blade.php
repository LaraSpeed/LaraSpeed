@extends('master')
@section('content')
<h1 class="text-danger">List of Customers</h1>

    <div class="row">

        <div class="col-md-12 col-sm-12">

            <form action="{{url("/customer/search")}}" method="get">
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
                    <button type="submit" formmethod="get" formaction="{{url("/customer")}}" class="btn btn-danger">Clear Search</button>
                </div>
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
                            <th class="text-md text-primary" nowrap> <!-- -->
                                First name
                            </th>                              <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Last name
                            </th>                              <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Email
                            </th>                                  <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Create date
                            </th>   
                                                                  <th class="text-md text-primary">
                                   Address
                                </th>
                                                              <th class="text-md text-primary">
                                   Store
                                </th>
                              
                                                            <th class="text-md text-primary">
                                    Payment
                                </th>
                                                             <th class="text-md text-primary">
                                    Rental
                                </th>
                                
                            <th class="text-md text-primary">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($customers as $customer)
                            <tr>
                                                                 <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$customer->first_name}} </td>
                                                              <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$customer->last_name}} </td>
                                                              <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$customer->email}} </td>
                                                                  <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$customer->create_date}} </td>
                               
                                                                         <td class="text-md">
                                        @if($customer->address)
                                            {{$customer->address->address}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                                                      <td class="text-md">
                                        @if($customer->store)
                                            {{$customer->store->address->address}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                  
                                                                <td class="text-md">
                                    <form action="{{url("/customer/related/$customer->customer_id")}}" method="get">
                                        <input type="hidden" name="tab" value="payment" />
                                        <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Customer&#039;s Payments">Payments</button>
                                    </form>
                                </td>
                                                             <td class="text-md">
                                    <form action="{{url("/customer/related/$customer->customer_id")}}" method="get">
                                        <input type="hidden" name="tab" value="rental" />
                                        <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Customer&#039;s Rentals">Rentals</button>
                                    </form>
                                </td>
                                
                                <td nowrap>
                                    <a href="{{url("/customer/$customer->customer_id")}}" data-toggle="tooltip" data-placement="top" title="Display">
                                        <button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button>
                                    </a>
                                    <a href="{{url("/customer/$customer->customer_id")}}/edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button>
                                    </a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $customer->first_name}} ?', '{{url("/customer/$customer->customer_id")}}')" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button>
                                    </a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="9"><label class="text-danger text-md">No customer matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table><!--End Table-->
                <div class="col-md-12">
                    {!!$customers->links()!!}
                </div>
            </div>
        </div>
    </section>@endsection