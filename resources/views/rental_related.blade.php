@extends('master')
@section('content')
@if(isset($rental->payment) && "payment" == $table)
            <div class="row">
        <div class="col-md-4">
            <h1 class="text-danger">List of Payments</h1>
        </div>

        <div class="col-md-5">
            {{ session(['defaultSelect' => $rental->rental_id]) }}
            <h4 class="text-danger"><b>Rental : {{$rental->customer_id}}</b></h4>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 col-sm-8">
            <form action="{{url("/rental/search")}}" method="get">
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
                            <th class="text-md text-primary" nowrap>
                              Amount
                            </th>                                                          <th class="text-md text-primary">
                                Customer
                            </th>
                          
                            <th class="text-md text-primary" nowrap>Actions</th>

                                 
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($rental->payment as  $payment)
                            <tr>
                                                               <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$payment->amount}} $</td>
                                   
                                                                       <td class="text-md">
                                        @if($payment->customer)
                                            {{$payment->customer->first_name}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                  
                                <td nowrap>
                                    <a href="{{url("/payment/$payment->payment_id")}}" data-toggle="tooltip" data-placement="top" title="Display"><button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button></a>
                                    <a href="{{url("/payment/$payment->payment_id")}}/edit" data-toggle="tooltip" data-placement="top" title="Edit"><button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button></a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $payment->amount}} ?', '{{url("/payment/$payment->payment_id")}}')" data-toggle="tooltip" data-placement="top" title="Delete"><button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button></a>
                                </td>

                                                                 </tr>
                        @empty
                            <tr>
                                <td colspan="5"><label class="text-danger text-md">No payment matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>        @else

        @endif
        @if(isset($rental->staff) && "staff" == $table)
            <h3 class="text-danger">Staff : </h3>
     {{$rental->staff->first_name}}
     {{$rental->staff->last_name}}
      {{$rental->staff->email}}
      {{$rental->staff->active}}
     {{$rental->staff->username}}
     {{$rental->staff->password}}
          @else

        @endif
 @endsection