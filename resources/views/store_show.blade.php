@extends('master')
@section('content')
<h1 class="text-danger">List of Stores</h1>

    <div class="row">

        <div class="col-md-8 col-sm-8">

            <form action="{{url("/store/search")}}" method="get">
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
            <form action="{{url("/store")}}" method="get">
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
                              
                                                              <th class="text-md text-primary">
                                   Address
                                </th>
                                    
                                                             <th class="text-md text-primary">
                                    Staff
                                </th>
                                                              <th class="text-md text-primary">
                                    Customer
                                </th>
                              
                            <th class="text-md text-primary">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($stores as $store)
                            <tr>
                                  
                                                                     <td class="text-md">
                                        @if($store->address)
                                            {{$store->address->address}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                        
                                                                 <td class="text-md">
                                    <form action="{{url("/store/related/$store->store_id")}}" method="get">
                                        <input type="hidden" name="tab" value="staff" />
                                        <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Staffs in the Store">Staffs</button>
                                    </form>
                                </td>
                                                              <td class="text-md">
                                    <form action="{{url("/store/related/$store->store_id")}}" method="get">
                                        <input type="hidden" name="tab" value="customer" />
                                        <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="">Customers</button>
                                    </form>
                                </td>
                              
                                <td nowrap>
                                    <a href="{{url("/store/$store->store_id")}}" data-toggle="tooltip" data-placement="top" title="Display">
                                        <button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button>
                                    </a>
                                    <a href="{{url("/store/$store->store_id")}}/edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button>
                                    </a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $store->address->address}} ?', '{{url("/store/$store->store_id")}}')" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button>
                                    </a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="3"><label class="text-danger text-md">No store matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table><!--End Table-->
                <div class="col-md-12">
                    {!!$stores->links()!!}
                </div>
            </div>
        </div>
    </section>@endsection