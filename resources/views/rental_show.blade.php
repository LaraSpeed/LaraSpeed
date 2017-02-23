@extends('master')
@section('content')
<h1 class="text-danger">List of Rentals</h1>

    <div class="row">

        <div class="col-md-8 col-sm-8">

            <form action="{{url("/rental/search")}}" method="get">
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
            <form action="{{url("/rental")}}" method="get">
                <button type="submit" class="btn btn-danger">Clear Search</button>
            </form>
        </div>
    </div>
    <br/>

    <div class="row">
        <div class="col-md-2 col-sm-2">
            <form action="{{url("/rental/create")}}" method="get">
                <button type="submit" class="btn btn-primary">Add new Rental</button>
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
            <h2 class="panel-title">Rentals</h2>
        </header>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                                                       <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Rental date
                            </th>                                  <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Return date
                            </th>     
                                                                <th class="text-md text-primary">
                                   Staff
                                </th>
                                                              <th class="text-md text-primary">
                                   Customer
                                </th>
                              
                                                            <th class="text-md text-primary">
                                    Payment
                                </th>
                                
                            <th class="text-md text-primary">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($rentals as $rental)
                            <tr>
                                                               <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$rental->rental_date}} </td>
                                                                  <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$rental->return_date}} </td>
                                 
                                                                       <td class="text-md">
                                        @if($rental->staff)
                                            {{$rental->staff->first_name}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                                                      <td class="text-md">
                                        @if($rental->customer)
                                            {{$rental->customer->first_name}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                  
                                                                <td class="text-md">
                                    <form action="{{url("/rental/related/$rental->rental_id")}}" method="get">
                                        <input type="hidden" name="tab" value="payment" />
                                        <button type="submit" class="btn btn-link">Payment</button>
                                    </form>
                                </td>
                                
                                <td nowrap>
                                    <a href="{{url("/rental/$rental->rental_id")}}" data-toggle="tooltip" data-placement="top" title="Display">
                                        <button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button>
                                    </a>
                                    <a href="{{url("/rental/$rental->rental_id")}}/edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button>
                                    </a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $rental->rental_date}} ?', '{{url("/rental/$rental->rental_id")}}')" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button>
                                    </a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7"><label class="text-danger text-md">No rental matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table><!--End Table-->
                <div class="col-md-12">
                    {!!$rentals->links()!!}
                </div>
            </div>
        </div>
    </section>@endsection