@extends('master')
@section('content')
<h1 class="text-danger">List of Payments</h1>

    <div class="row">

        <div class="col-md-12 col-sm-12">

            <form action="{{url("/payment/search")}}" method="get">
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
                    <button type="submit" formmethod="get" formaction="{{url("/payment")}}" class="btn btn-danger">Clear Search</button>
                </div>
            </form>
        </div>
    </div>
    <br/>

    <div class="row">
        <div class="col-md-2 col-sm-2">
            <form action="{{url("/payment/create")}}" method="get">
                <button type="submit" class="btn btn-primary">Add new Payment</button>
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
            <h2 class="panel-title">Payments</h2>
        </header>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                                                           <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Amount
                            </th>                              <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Payment date
                            </th> 
                                                              <th class="text-md text-primary">
                                   Rental
                                </th>
                                                              <th class="text-md text-primary">
                                   Customer
                                </th>
                                                              <th class="text-md text-primary">
                                   Staff
                                </th>
                              
                                
                            <th class="text-md text-primary">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($payments as $payment)
                            <tr>
                                                                   <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$payment->amount}} $</td>
                                                              <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$payment->payment_date}} </td>
                             
                                                                     <td class="text-md">
                                        @if($payment->rental)
                                            {{$payment->rental->rental_date}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                                                      <td class="text-md">
                                        @if($payment->customer)
                                            {{$payment->customer->first_name}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                                                      <td class="text-md">
                                        @if($payment->staff)
                                            {{$payment->staff->first_name}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                  
                                    
                                <td nowrap>
                                    <a href="{{url("/payment/$payment->payment_id")}}" data-toggle="tooltip" data-placement="top" title="Display">
                                        <button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button>
                                    </a>
                                    <a href="{{url("/payment/$payment->payment_id")}}/edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button>
                                    </a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $payment->payment_date}} ?', '{{url("/payment/$payment->payment_id")}}')" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button>
                                    </a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5"><label class="text-danger text-md">No payment matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table><!--End Table-->
                <div class="col-md-12">
                    {!!$payments->links()!!}
                </div>
            </div>
        </div>
    </section>@endsection