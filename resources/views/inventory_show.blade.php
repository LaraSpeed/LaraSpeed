@extends('master')
@section('content')
<h1 class="text-danger">List of Inventorys</h1>

    <div class="row">

        <div class="col-md-8 col-sm-8">

            <form action="{{url("/inventory/search")}}" method="get">
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
            <form action="{{url("/inventory")}}" method="get">
                <button type="submit" class="btn btn-danger">Clear Search</button>
            </form>
        </div>
    </div>
    <br/>

    <div class="row">
        <div class="col-md-2 col-sm-2">
            <form action="{{url("/inventory/create")}}" method="get">
                <button type="submit" class="btn btn-primary">Add new Inventory</button>
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
            <h2 class="panel-title">Inventorys</h2>
        </header>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                                
                                                              <th class="text-md text-primary">
                                   Film
                                </th>
                                
                            <th class="text-md text-primary">Actions</th>

                                                       </tr>
                    </thead>

                    <tbody>
                        @forelse($inventorys as $inventory)
                            <tr>
                                    
                                                                     <td class="text-md">
                                        @if($inventory->film)
                                            {{$inventory->film->title}}
                                        @else
                                            {{ "Not specified" }}
                                        @endif
                                    </td>
                                    
                                <td nowrap>
                                    <a href="{{url("/inventory/$inventory->inventory_id")}}" data-toggle="tooltip" data-placement="top" title="Display">
                                        <button class="btn-sm btn-success"><i class="fa fa-arrows-alt fa-lg"></i></button>
                                    </a>
                                    <a href="{{url("/inventory/$inventory->inventory_id")}}/edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <button class="btn-sm btn-warning"><i class="fa fa-edit fa-lg"></i></button>
                                    </a>
                                    <a href="" ng-click="showModal('Delete', 'Do you really want to delete {{ $inventory->film_id}} ?', '{{url("/inventory/$inventory->inventory_id")}}')" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <button class="btn-sm btn-danger"><i class="fa fa-trash-o fa-lg"></i></button>
                                    </a>
                                </td>

                                                               </tr>
                        @empty
                            <tr>
                                <td colspan="4"><label class="text-danger text-md">No inventory matching keyword {{session('keyword', 'Keyword')}}.</label></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table><!--End Table-->
            </div>
        </div>
    </section>@endsection