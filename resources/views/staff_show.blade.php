@extends('master')
@section('content')
<h1 class="text-danger">List of Staffs</h1>

    <div class="row">

        <div class="col-md-8 col-sm-8">

            <form action="{{url("/staff/search")}}" method="get">
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
            <form action="{{url("/staff")}}" method="get">
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
                            <th class="text-md text-primary" nowrap> <!-- -->
                                First name
                            </th>                              <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Last name
                            </th>                                <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Email
                            </th>                                  <!--class="{$attrType->formClass("table")}}"-->
                            <th class="text-md text-primary" nowrap> <!-- -->
                                Username
                            </th>     
                                                                  <th class="text-md text-primary">
                                   Address
                                </th>
                                                              <th class="text-md text-primary">
                                   Store
                                </th>
                              
                            <th class="text-md text-primary">Actions</th>

                                                            <th class="text-md text-primary">
                                    Rental
                                </th>
                                                             <th class="text-md text-primary">
                                    Payment
                                </th>
                                                        </tr>
                    </thead>

                    <tbody>
                        @forelse($staffs as $staff)
                            <tr>
                                                               <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$staff->first_name}} </td>
                                                              <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$staff->last_name}} </td>
                                                                <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$staff->email}} </td>
                                                                  <!--class="{$attrType->formClass("table")}}"-->
                                <td class="text-md">{{$staff->username}} </td>
                                 
                                                                         <td class="text-md">
                                        @if($staff->address)
                                            {{$staff->address->address}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                                                      <td class="text-md">
                                        @if($staff->store)
                                            {{$staff->store->address->address}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                  
                                <td nowrap>
                                    <a href="{{url("/staff/$staff->staff_id")}}" data-toggle="tooltip" data-placement="top" title="Display">
                                        <button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button>
                                    </a>
                                    <a href="{{url("/staff/$staff->staff_id")}}/edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button>
                                    </a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $staff->first_name}} ?', '{{url("/staff/$staff->staff_id")}}')" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button>
                                    </a>
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
                </table><!--End Table-->
                <div class="col-md-12">
                    {!!$staffs->links()!!}
                </div>
            </div>
        </div>
    </section>@endsection