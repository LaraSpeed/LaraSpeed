@extends('master')
@section('content')
@if(isset($staff->rental) && "rental" == $table)
            <div class="row">
        <div class="col-md-4">
            <h1 class="text-danger">List of Rentals</h1>
        </div>

        <div class="col-md-5">
            {{ session(['defaultSelect' => $staff->staff_id]) }}
            <h4 class="text-danger"><b>Staff : {{$staff->first_name}}</b></h4>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 col-sm-8">
            <form action="{{url("/staff/search")}}" method="get">
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
                            <th class="text-md text-primary" nowrap>
                              Return date
                            </th>                                  
                            <th class="text-md text-primary" nowrap>Actions</th>

                                                             <th class="text-md text-primary">
                                    Payment
                                </th>
                                
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($staff->rental as  $rental)
                            <tr>
                                                                 <!-- class="{$attrType->formClass("table")}}" -->
                                <td class="text-md">{{$rental->return_date}}</td>
                                     
                                     
                                <td nowrap>
                                    <a href="{{url("/rental/$rental->rental_id")}}" data-toggle="tooltip" data-placement="top" title="Display"><button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button></a>
                                    <a href="{{url("/rental/$rental->rental_id")}}/edit" data-toggle="tooltip" data-placement="top" title="Edit"><button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button></a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $rental->customer_id}} ?', '{{url("/rental/$rental->rental_id")}}')" data-toggle="tooltip" data-placement="top" title="Delete"><button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button></a>
                                </td>

                                                                 <td class="text-md">
                                    <form action="{{url("/rental/related/$rental->rental_id")}}" method="get">
                                        <input type="hidden" name="tab" value="payment" />
                                        <button type="submit" class="btn btn-link">Payment</button>
                                    </form>
                                </td>
                                                            </tr>
                        @empty
                            <tr>
                                <td colspan="7"><label class="text-danger text-md">No rental matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>        @else

        @endif
        @if(isset($staff->address) && "address" == $table)
            <h3 class="text-danger">Address : </h3>
     {{$staff->address->address}}
     {{$staff->address->address2}}
     {{$staff->address->district}}
      {{$staff->address->postal_code}}
     {{$staff->address->phone}}
          @else

        @endif
 @endsection